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

    $id = $_GET['id'];
    $message = "";
    $sqlSelect = "SELECT * FROM `desserts` WHERE id = $id";
   
    $result = mysqli_query($connect, $sqlSelect);
    $row = mysqli_fetch_assoc($result);
    $picture = $row['picture'];
    if ($picture != 'cakefault.png') {
        unlink("../uploads/$picture");
    }

    // $sql = "DELETE FROM `desserts` WHERE id = $id";

    // if (mysqli_query($connect, $sql)) {
       
    // } else {
        
    // }
    
    if (mysqli_num_rows($result) == 1) {
        $name = $row['name'];
        $type = $row['type'];
        $cuisine = $row['cuisine'];
        $prep_time = $row['prep_time'];
        $cook_time = $row['cook_time'];
        $total_time = $row['total_time'];
        $servings = $row['servings'];
        $ingredients = $row['ingredients'];
        $instructions = $row['instructions'];
        $picture = $row['picture'];
        $link = $row['link'];
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
        <?php require "../folder/navbar.php" ?>
    </header>
    <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <!-- <a href="../index.php"><button class="btn btn-success">Home</button></a> -->
        </div>
    <div>
        <h2 class="headline m-3">Selected recipe: </h2>
        <div class="selected d-inline m-5">
        <img src="../img/<?= $picture ?>" class="rounded-circle" height="50px" alt="<?= $name ?>">
            <span class="h1"><?= $name ?></span>
        </div>
        
        <h3 class="headline mb-4">Do you really want to delete this recipe?</h3>
        <form action="./a_delete.php" method="post" class="form-group text-center m-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="picture" value="<?= $picture ?>">
            <button class="btn btn-danger" type="submit" name="submit">Yes, delete it!</button>
            <a href="../components/index.php" type="button" class="btn btn-warning">No, go back!</a>
        </form>

    </div>
    
    <?php require "../folder/footer.php" ?>
</body>
</html>