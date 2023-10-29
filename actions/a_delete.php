<?php
    session_start();
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: ../index.php");
    } 
    if (isset($_SESSION['user'])) {
        header("Location: ../home.php");
    }
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture = 'default.png')?: unlink("../uploads/$picture");

        $sql = "DELETE FROM `desserts` WHERE id = $id ";

        if (mysqli_query($connect, $sql) == true) {
            $class = "success";
            $message = "Successfully Deleted!";  
            header("refresh:5;URL=../components/index.php");
        } else {
            $class = "danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
        mysqli_close($connect);
        // var_dump($id);
    } else {
        header("location: ./error.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete A Recipe</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "../components/navbar.php" ?>
    </header>

    <div class="container">
           <div class="mt-3 mb-3">
               <h1>Delete request response</h1>
           </div>
           <div class="alert alert-<?=$class;?>" role="alert">
               <p><?=$message;?></p>
               <!-- <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a> -->
           </div>
       </div>

    <?php require "../folder/footer.php" ?>
</body>
</html>