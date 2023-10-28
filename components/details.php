<?php
    session_start();

     require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";

     $id = $_GET['id'];
     $sql = "SELECT * FROM desserts WHERE id = $id";
     $body = "";
     $result = mysqli_query($connect, $sql);
     $row = mysqli_fetch_assoc($result);
     $type = ucfirst($row['type']);
      
        if (isset($_SESSION['adm'])) {
            $body .= "
        <h1 class='text-center'> {$row['name']} </h1>
        <div class='content w-100 m-auto'>
            <div class='cover'>
                <div class='imgDiv'>
                <img src='../img/{$row['picture']}' alt='{$row['name']}' id='image'>
                </div>
                <div class='textDiv'>
                    <p>Type: {$type}</p>
                    <p>Cuisine: {$row['cuisine']}.</p>
                    <p>Preparation time: {$row['prep_time']}.</p>
                    <p>Cooking time: {$row['cook_time']}.</p>
                    <p>Total time: {$row['total_time']}.</p>
                    <p>Servings: {$row['servings']}.</p>
                    <p class='text-center'>Ingridients:</p>                
                    <p>{$row['ingredients']}.</p>                
                </div>
            </div>
            <h4 class='text-center mt-4'>Instructions: </h4>
            <div class='cover2'>
                <p>{$row['instructions']}.</p>
                <a href='{$row['link']}'>{$row['name']}.</a>
            </div>
            <div class='btns'>
                <a href='../actions/update.php?id={$row["id"]}' class='btn btn-warning'>Update</a>
                <a href='../actions/delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
            </div>
        </div>";
        } else {
            $body .= "
        <h1 class='text-center'> {$row['name']} </h1>
        <div class='content w-100 m-auto'>
            <div class='cover'>
                <div class='imgDiv'>
                <img src='../img/{$row['picture']}' alt='{$row['name']}' id='image'>
                </div>
                <div class='textDiv'>
                    <p>Type: {$type}</p>
                    <p>Cuisine: {$row['cuisine']}.</p>
                    <p>Preparation time: {$row['prep_time']}.</p>
                    <p>Cooking time: {$row['cook_time']}.</p>
                    <p>Total time: {$row['total_time']}.</p>
                    <p>Servings: {$row['servings']}.</p>
                    <p class='text-center'>Ingridients:</p>                
                    <p>{$row['ingredients']}.</p>                
                </div>
            </div>
            <h4 class='text-center mt-4'>Instructions: </h4>
            <div class='cover2'>
                <p>{$row['instructions']}.</p>
                <a href='{$row['link']}'>{$row['name']}.</a>
            </div>
        </div>";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <?php require "../folder/navbar.php" ?>
    <div class="detailsContainer">
    <?= $body?>
    </div>
    
    <?php require "../folder/footer.php" ?>
</body>
</html>