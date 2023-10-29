<?php
         require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
         require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe of the Month</title>
    <?php require '../folder/boot.php'?>
</head>

<body>
    <?php require "../folder/navbar.php" ?>

    <div class="container-recipe">
        <?= $body?>
        

    </div>

    <?php require "../folder/footer.php" ?>

</body>

</html>