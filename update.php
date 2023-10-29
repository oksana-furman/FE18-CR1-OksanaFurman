<?php
    session_start();
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
    } 
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

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
            ($_POST["picture"] == "default.png") ?: unlink("img/{$_POST["picture"]}");

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', birth_date = '$birth_date',  email = '$email', picture = '$pictureArray->fileName' WHERE id = '$id'";
        } else {
            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', birth_date = '$birth_date', email = '$email' WHERE id = '$id'";
        }

        if (mysqli_query($connect, $sql) === true) {
            $class = "alert alert-success";
            $message = "The record was successfully updated";
            $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
            header("refresh:3;url=update.php?id={$id}");
        } else {
            $class = "alert alert-danger";
            $message = "Error while updating record : <br>" . $connect->error;
            $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
            header("refresh:3;url=./update.php?id={$id}");
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
        <?php require './folder/boot.php'?>
      </head>
      <body>

        <header>
            <?php require "./folder/navbar.php" ?>
        </header>

        <div class="container">
            <div class="<?= $class ?>" role="alert">
            <p><?= ($message) ?? ''; ?></p>
            <p><?= ($uploadError) ?? ''; ?></p>
            </div>
            <h2>Update your profile</h2>

            <img class='img-thumbnail rounded-circle' src='./img/<?= $data['picture'] ?>' alt="<?= $first_name ?>" height="150px">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <th class="text-white">First Name</th>
                        <td><input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?= $first_name ?>" /></td>
                    </tr>
                    <tr>
                        <th class="text-white">Last Name</th>
                        <td><input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?= $last_name ?>" /></td>
                    </tr>
                    <tr>
                        <th class="text-white">Username</th>
                        <td><input class="form-control" type="text" name="user_name" placeholder="Username" value="<?= $user_name ?>" /></td>
                    </tr>
                    <tr>
                        <th class="text-white">Date of birth</th>
                        <td><input class="form-control" type="date" name="birth_date" placeholder="Date of birth" value="<?= $birth_date ?>" /></td>
                    </tr>
                    <tr>
                        <th class="text-white">Email</th>
                        <td><input class="form-control" type="email" name="email" placeholder="Email" value="<?= $email ?>" /></td>
                    </tr>
                    <tr>
                        <th class="text-white">Picture</th>
                        <td><input class="form-control" type="file" name="picture" /></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                        <input type="hidden" name="picture" value="<?= $picture ?>" />
                        <td><button name="submit" class="btn btn-success" type="submit">Save Changes</button></td>
                        <td><a href="<?php echo $backBtn ?>"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>

                </table>
            </form>
        </div>

        <?php require "./folder/footer.php" ?> 
      </body>
      </html>