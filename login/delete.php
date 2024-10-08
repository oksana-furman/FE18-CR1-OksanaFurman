<?php
    session_start();
    require_once "../actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    } 
    if (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    } 

    $class = 'd-none';
    if ($_GET['id']) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $user_name = $data['user_name'];
            $birth_date = $data['birth_date'];
            $email = $data['email'];
            $picture = $data['picture'];
        }
    }

    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture == "default.png") ?: unlink("../uploads/$picture");
      
        $sql = "DELETE FROM users WHERE id = {$id}";
        if ($connect->query($sql) === TRUE) {
            $class = "alert alert-success";
            $message = "Successfully Deleted!";
            
            header("refresh:3;url=dashboard.php");
        } else {
            $class = "alert alert-danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
      }
      mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete profile</title>
    <?php require '../folder/boot.php'?>
</head>
<body>

    <header>
        <?php require_once "./navbar-login.php" ?>
    </header>   
    
    <div class="cont w-100">
        <div class="<?= $class; ?>" role="alert">
            <p class="text-white"><?= ($message) ?? ''; ?></p>
        </div>
        
        <fieldset class="text-center m-2">
            <legend class='h2 m-3'>Delete request</legend>
            <legend class='m-3'><img class='img-thumbnail rounded-circle' src='../uploads/<?= $picture ?>' alt="<?= $user_name ?>" width="150px"></legend>
            <h4 class="m-3">You have selected the data below:</h4>
            <table class="table w-75 mt-4 text-white m-auto">
                <tr>
                    <th>User name</td>
                    <th>Email</td>
                    <th>Full name</td>
                    <th>date of birth</td>
                </tr>
                <tr>
                    <td><?= "$user_name" ?></td>
                    <td><?= $email ?></td>
                    <td><?= "$first_name $last_name" ?></td>
                    <td><?= $birth_date ?></td>
                </tr>
            </table>

            <h3 class="m-4">Do you really want to delete this user?</h3>
            <form method="post" class="form-group m-4">
                <input type="hidden" name="id" value="<?= $id ?>" />
                <input type="hidden" name="picture" value="<?= $picture ?>" />
                <div class="btns">
                    <button class="btn m-2" type="submit">Yes, delete it!</button>
                <a href="dashboard.php"><button class="btn m-2" type="button">No, go back!</button></a>
                </div>
            </form>
        </fieldset>
    </div>
    <?php require "../folder/footer.php" ?> 
</body>
</html>