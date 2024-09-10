<?php
    session_start();
    // verification of the user
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: ../index.php");
    } 
    if (isset($_SESSION['user'])) {
        header("Location: ../home.php");
    }
    require_once "./db_connect.php";
    require_once "./file_upload.php";

    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";
    
    // if the form is submitted
    if ($_POST) {
        $id = $_POST['id'];
        $picture = $_POST['picture'];
        ($picture = 'default.png')?: unlink("../img/$picture");

        $sql = "DELETE FROM `desserts` WHERE id = $id ";

        if (mysqli_query($connect, $sql) == true) {
            $class = "success";
            $message = "Successfully Deleted!";  
            header("refresh:5;URL=../components/index.php");
        } else {
            $class = "danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
    } else {
        // if the form isn't submitted
        header("location: ./error.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete A Recipe</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require_once "./navbar-actions.php" ?>
    </header>

    <div class="container">
           <!-- <div class="mt-3 mb-3">
               <h1>Delete request response</h1>
           </div> -->
           <div class="alert alert-<?=$class;?> h-75" role="alert">
               <p><?=$message;?></p>
           </div>
       </div>

    <?php require_once "../folder/footer.php" ?>
</body>
</html>