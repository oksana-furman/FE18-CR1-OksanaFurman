<?php
    session_start();
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";

    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($clean);
        $clean = htmlspecialchars($clean);
        return  $clean;
    }

    if (isset($_SESSION['user']) != "") {
        header("Location: home.php");
        exit;
    }
    if (isset($_SESSION['adm']) != "") {
        header("Location: dashboard.php");
    }
    $error = false;
    $user_name = $password = $unameError = $passError = '';

    if (isset($_POST['btnLogin'])) {
        $user_name = cleanInput($_POST['user_name']);
        $password = cleanInput($_POST['password']);

        if (empty($user_name)) {
            $error = true;
            $unameError = "Please enter your user name.";
        } 

        if (empty($password)) {
            $error = true;
            $passError = "Please enter your password.";
        } 
        
        if (!$error) {
            $password = hash('sha256', $password);
            $sql = "SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'";
            $result = mysqli_query($connect, $sql);

            // count the result
            $count = mysqli_num_rows($result);
            # converting result into associative array to fetch the data
            $row = mysqli_fetch_assoc($result);
            

            if ($count == 1 & $row['password'] == $password) {
                if ($row['status'] == 'adm') {
                    $_SESSION['adm'] = $row['id'];
                    header("Location: dashboard.php");
                } else {
                    $_SESSION['user'] = $row['id'];
                    header("Location: home.php");
                }
            } else {
                $errMSG = "Incorrect Credentials, Try again...";
            }
        }
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require './folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "./navbar.php" ?>
    </header>
    <div class="container m-auto">
        <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" autocomplete="off" method="post" class="form-group w-75">
            <h2 class="text-center">Login</h2>
            <hr>
            <?php
                if (isset($errMSG)) {
                    echo $errMSG;
                }
            ?>
            <label for="user_name">Username</label>
            <input type="text" name="user_name" id="user_name" class="form-control">
            <span class="text-danger"><?php echo $unameError; ?></span>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <span class="text-danger"><?php echo $passError; ?></span>
             <br>

            <button class="btn mb-2" type="submit" name="btnLogin">Sign in</button>
            <br>
            <a href="register.php" class="link form-control">Not registered yet? Click here</a>
        </form>
    </div>

    
    <?php require "./folder/footer.php" ?>  
</body>
</html>