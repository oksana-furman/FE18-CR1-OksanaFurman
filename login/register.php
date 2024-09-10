<?php
    session_start();
    // verification of the user
    if (isset($_SESSION['user']) != "") {
        header("Location: ./home.php");
    }
    if (isset($_SESSION['adm']) != "") {
        header("Location: dashboard.php");
    }
    require_once "../actions/db_connect.php";
    require_once "../actions/file_upload.php";

    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";
    
    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($clean);
        $clean = htmlspecialchars($clean);
        return  $clean;
    }
    $first_name = $last_name = $user_name = $birth_date = $password = $email = $picture = '';
    $fnameError = $lnameError = $unameError = $dateError = $passError = $emailError = $picError = '';

    if (isset($_POST['signUp'])) {
        $error = false;
        $first_name = cleanInput($_POST['first_name']);
        $last_name = cleanInput($_POST['last_name']);
        $user_name = cleanInput($_POST['user_name']);
        $birth_date = cleanInput($_POST['birth_date']);
        $password = cleanInput($_POST['password']);
        $email = cleanInput($_POST['email']);

        // name validation
        if (empty($first_name)) {
            $error = true;
            $fnameError = "Please enter your first name.";
        } elseif (strlen($first_name) < 3 || strlen($first_name) > 30) {
            $error = true;
            $fnameError = "First name must have minimum 3 characters and maximum 30 characters.";
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $first_name)) {
            $error = true;
            $fnameError = "First name must contain only letters and spaces.";
        } 

        if (empty($last_name)) {
            $error = true;
            $lnameError = "Please enter your last name.";
        } elseif (strlen($last_name) < 3 || strlen($last_name) > 30) {
            $error = true;
            $lnameError = "Last name must have minimum 3 characters and maximum 30 characters.";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
            $error = true;
            $lnameError = "Last name must contain only letters and no spaces.";
        }
        // username validation
        if (empty($user_name)) {
            $error = true;
            $unameError = "Please enter your username.";
        } elseif (strlen($user_name) < 3 || strlen($user_name) > 30) {
            $error = true;
            $unameError = "Username must have minimum 3 characters and maximum 30 characters.";
        } elseif (!preg_match("/^[a-zA-Z\d]+$/", $user_name)) {
            $error = true;
            $unameError = "Username must contain only letters and numbers, but no spaces.";
        } else {
            $sql = "SELECT user_name FROM users WHERE user_name = '$user_name'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows( $result) != 0) {
                $error = true;
                $unameError = "Provided username is already in use."; 
            }
        }
        // birth date validation
        if (empty($birth_date)) {
            $error = true;
            $dateError = "Please enter your date of birth."; 
        }
        // password validation
        if (empty($password)) {
            $error = true;
            $passlError = "Please enter your password."; 
        } elseif (strlen($password) < 6) {
            $error = true;
            $passError = "Password must have at least 6 characters.";
        }
        $password = hash("sha256", $password);

        // email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address.";            
        } else {
            $sql = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows( $result) != 0) {
                $error = true;
                $emailError = "Provided email is already in use."; 
            }
        }

        $picture = file_upload($_FILES['picture'], "user");
        
        if (!$error) {
            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `user_name`, `birth_date`, `password`, `email`, `picture`) VALUES ('$first_name','$last_name','$user_name','$birth_date','$password','$email','$picture->fileName')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                $class = "success";
                $errorMesssage = "Successfully registered. You may login now.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
            } else {
                $class = "danger";
                $errorMesssage = "Something went wrong. Try again later.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
            }
        }
        mysqli_close($connect);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require_once "./navbar-login.php" ?>
    </header>

    <h1 class="text-center m-4">Registration Form</h1>
    <?php if (isset($errorMesssage)) {?>
        <div class="alert alert-<?= $class ?>" role="alert">
            <p><?= $errorMesssage ?></p>
            <p><?=  $uploadError ?></p>
        </div>
    <?php } ?>

    <div class="container m-auto">
        <form action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>" method="post" enctype="multipart/form-data" class="form-group m-4">
            <input type="text" name="first_name" class="form-control m-3" placeholder="type your first name" value="<?= $first_name; ?>">
            <span class="text-danger"> <?= $fnameError; ?> </span>

            <input type="text" name="last_name" class="form-control m-3" placeholder="type your last name" value="<?= $last_name; ?>">
            <span class="text-danger"> <?= $lnameError; ?> </span>

            <input type="text" name="user_name" class="form-control m-3" placeholder="type your user name" value="<?= $user_name; ?>">
            <span class="text-danger"> <?= $unameError; ?> </span>

            <input type="date" name="birth_date" class="form-control m-3" value="<?= $birth_date; ?>">
            <span class="text-danger"> <?= $dateError; ?> </span>
            
            <input type="password" name="password" class="form-control m-3" placeholder="type your password">
            <span class="text-danger"> <?= $passError; ?> </span>

            <input type="email" name="email" class="form-control m-3" placeholder="type your email" value="<?= $email ?>">
            <span class="text-danger"> <?= $emailError; ?> </span>

            <input type="file" name="picture" class="form-control m-3">
            <span class="text-danger"> <?= ($picture->ErrorMessage)??""; ?> </span> <br>
            <div class="btns">
                <input type="submit" name="signUp" value="Sign up" class="btn">
            </div>
            <!-- log in link -->
            <a class="link" href="./index.php">Sign in Here...</a>
        </form>
    </div>

    <?php require_once "../folder/footer.php" ?>  
</body>
</html>