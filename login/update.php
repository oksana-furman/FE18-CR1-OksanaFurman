<?php
    session_start();
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
    } 
    require_once "../actions/db_connect.php";
    require_once "../actions/file_upload.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    $backBtn = '';
    if (isset($_SESSION['user'])) {
        $backBtn = './home.php';
    } 

    if (isset($_SESSION["adm"])) {
        $backBtn = "./dashboard.php";
      }

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);

            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $user_name = $data['user_name'];
            $birth_date = $data['birth_date'];
            $email = $data['email'];
            $picture = $data['picture'];
        }
    }
    
    $class = 'd-none';
    if (isset($_POST["submit"])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $birth_date = $_POST['birth_date'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        $uploadError = '';
        $pictureArray = file_upload($_FILES['picture']); //file_upload() called
        $picture = $pictureArray->fileName;
        if ($pictureArray->error === 0) {
            ($_POST["picture"] == "default.png") ?: unlink("../uploads/{$_POST["picture"]}");

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', birth_date = '$birth_date',  email = '$email', picture = '$pictureArray->fileName' WHERE id = '$id'";
        } else {
            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', birth_date = '$birth_date', email = '$email' WHERE id = '$id'";
        }

            $class = "alert alert-success";
            $message = "The record was successfully updated";
            $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
            header("refresh:5;url=update.php?id={$id}");
            if (mysqli_query($connect, $sql) === true) {
                if (isset($_SESSION['adm'])) {
                    header("refresh:6;url=dashboard.php");
                } else {
                    header("refresh:6;url=home.php");
                }
        } else {
            $class = "alert alert-danger";
            $message = "Error while updating record : <br>" . $connect->error;
            $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
            // header("refresh:5;url=./update.php?id={$id}");
        }
    }
    mysqli_close($connect);

      ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Profile</title>
        <?php require_once '../folder/boot.php'?>
      </head>
      <body>

        <header>
            <?php require_once "./navbar-login.php" ?>
        </header>

        <div class="container flex-column">
            <div class="<?= $class ?>" role="alert">
            <p><?= ($message) ?? ''; ?></p>
            <p><?= ($uploadError) ?? ''; ?></p>
            </div>
            <h2 class="text-center">Update this profile</h2>

            <div class="imgDiv text-center">
                <img class='img-thumbnail rounded-circle' src='../uploads/<?= $data['picture'] ?>' alt="<?= $first_name ?>" width="150px">
                <h3><?= $user_name ?></h3>
            </div>
            

            <form action="" method="post" enctype="multipart/form-data" class="form-group flex flex-column m-auto">
                <label for="first_name">First Name</label>
                    <input class="form-control m-2" type="text" id="first_name" name="first_name" placeholder="First Name" value="<?= $first_name ?>">

                <label for="last_name">Last Name</label>
                    <input class="form-control m-2" type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?= $last_name ?>">  

                <label for="user_name">Username</label>
                    <input class="form-control m-2" type="text" id="user_name" name="user_name" placeholder="Username" value="<?= $user_name ?>">
                
                   
                <label for="birth_date">Date of birth</label>
                    <input class="form-control m-2" type="date" id="birth_date" name="birth_date" placeholder="Date of birth" value="<?= $birth_date ?>">
                
                   
                <label for="email">Email</label>
                    <input class="form-control m-2" type="email" id="email" name="email" placeholder="Email" value="<?= $email ?>">
                
                      
                <label for="picture">Picture</label>
                    <input class="form-control m-2" type="file" id="picture" name="picture">
                
                    
                <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                <input type="hidden" name="picture" value="<?= $picture ?>" />

                <div class="btns">
                    <button name="submit" class="btn m-2" type="submit">Save Changes</button>
                    <a href="<?php echo $backBtn ?>"><button class="btn m-2" type="button">Back</button></a>
                </div>
            </form>
        </div>

        <?php require_once "../folder/footer.php" ?> 
      </body>
      </html>