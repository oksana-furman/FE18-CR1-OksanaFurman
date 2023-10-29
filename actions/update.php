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

    // echo $_GET["id"];
    $id = $_GET['id'];
    $sql = "SELECT * FROM `desserts` WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $class = "";
    $message = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit the Recipe</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "../components/navbar.php" ?>
    </header>

    <div class="alert alert-<?= $class; ?>" role="alert">
        <p><?= $message; ?></p>
    </div>

    <h1 class="headline">Edit the Recipe: <?= $row['name'] ?></h1>

    <form action="./a_update.php" method="post" enctype="multipart/form-data" class="form-group m-3">
        <label>Name of the dish
            <input type="text" name="name" id="name" class="form-control m-2" value="<?= $row['name'] ?>">
        </label><br>
        <label>Type of the dish
            <input type="text" name="type" id="type" class="form-control m-2" value="<?= $row['type'] ?>">
        </label><br>
        <label>Cuisine
            <input type="text" name="cuisine" id="cuisine" class="form-control m-2" value="<?= $row['cuisine'] ?>">
        </label><br>  
        <label>Preparation time 
            <input type="text" name="prep_time" id="prep_time" class="form-control m-2" value="<?= $row['prep_time'] ?>">
        </label><br> 
        <label>Cooking time
            <input type="text" name="cook_time" id="cook_time" class="form-control m-2" value="<?= $row['cook_time'] ?>">
        </label><br>
        <label>Total time
            <input type="text" name="total_time" id="total_time" class="form-control m-2" value="<?= $row['total_time'] ?>">
        </label><br>
        <label>Number of servings
            <input type="number" name="servings" id="servings" class="form-control m-2" value="<?= $row['servings'] ?>">
        </label><br>
        <label>Ingredients
            <textarea name="ingredients" id="ingredients" cols="30" rows="10" class="form-control m-2" value=""><?= $row['ingredients'] ?></textarea>
        </label><br>
        <label>Instructions
            <textarea name="instructions" id="instructions" cols="30" rows="10" class="form-control m-2" value=""><?= $row['instructions'] ?></textarea>
        </label><br>
        <label>Link
            <input type="text" name="link" id="link" class="form-control m-2" value="<?= $row['link'] ?>">
        </label><br>
        <label>
            <input type="file" name="picture" id="picture" class="form-control m-2">
        </label><br>

        <input class="form-control m-2" type="hidden" name="id" value="<?= $row['id'] ?>">
            <input class="form-control m-2" type="hidden" name="picture" value="<?= $row['picture'] ?>">
            <div class="btnDiv">
                <input type="submit" class="btn btn-warning m-2" name="update" value="Update">
            </div>
    </form>

    <?php require "../folder/footer.php" ?>
</body>
</html>