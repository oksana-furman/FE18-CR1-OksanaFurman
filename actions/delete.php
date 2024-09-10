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

    $id = $_GET['id'];
    $message = "";
    $sqlSelect = "SELECT * FROM `desserts` WHERE id = $id";
   
    $result = mysqli_query($connect, $sqlSelect);
    $row = mysqli_fetch_assoc($result);
    $picture = $row['picture'];
    if ($picture != 'cakefault.png') {
        unlink("../img/$picture");
    }
    
    if (mysqli_num_rows($result) == 1) {
        $name = $row['name'];
        $type = $row['type'];
        $cuisine = $row['cuisine'];
        $prep_time = $row['prep_time'];
        $cook_time = $row['cook_time'];
        $total_time = $row['total_time'];
        $servings = $row['servings'];
        $picture = $row['picture']; 
        $status = $row['status'];
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
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require_once "./navbar-actions.php" ?>
    </header>
    <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
        </div>
    <div>
        <!-- print info about the recipe selected to delete -->
        <h2 class="headline m-3">Selected recipe: </h2>
        <div class="selected d-inline m-5">
        <img src="../img/<?= $picture ?>" class="rounded-circle" height="50px" alt="<?= $name ?>">
            <span class="h1"><?= $name ?></span>
        </div>
        <!-- conformation to delete the recipe -->
        <h3 class="headline mb-4">Do you really want to delete this recipe?</h3>
        <form action="./a_delete.php" method="post" class="form-group text-center m-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="picture" value="<?= $picture ?>">
            <button class="btn btn-danger" type="submit" name="submit">Yes, delete it!</button>
            <a href="../components/index.php" type="button" class="btn btn-warning">No, go back!</a>
        </form>
    </div>
    <?php require_once "../folder/footer.php" ?>
</body>
</html>