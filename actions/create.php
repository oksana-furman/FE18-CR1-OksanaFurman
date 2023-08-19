<?php
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding a new recipe</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "../folder/navbar.php" ?>
    </header>
    <div class="headline">
          <h1>Adding a new recipe</h1>  
    </div>

    <div class="container m-auto">

        <form action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>" method="post" class="m-auto" >
        <input type="text" placeholder="Name of the dish" name="name" id="name" class="form-control m-2">
        <input type="text" placeholder="Type of the dish" name="type" id="type" class="form-control m-2">
        <input type="text" placeholder="Cuisine" name="cuisine" id="cuisine" class="form-control m-2">
        <input type="text" placeholder="Preparation time" name="prep_time" id="prep_time" class="form-control m-2">
        <input type="text" placeholder="Cooking time" name="cook_time" id="cook_time" class="form-control m-2">
        <input type="text" placeholder="Total time" name="total_time" id="total_time" class="form-control m-2">
        <input type="number" placeholder="Number of servings" name="servings" id="servings" class="form-control m-2">
        <!-- <input type="text" placeholder="Ingredients" name="ingredients" id="ingredients" class="form-control m-2"> -->
        <textarea placeholder="Ingredients" name="ingredients" id="ingredients" cols="30" rows="10" class="form-control m-2"></textarea>
        <!-- <input type="text" placeholder="Instructions" name="instructions" id="instructions" class="form-control m-2"> -->
        <textarea placeholder="Instructions" name="instructions" id="instructions" cols="30" rows="10" class="form-control m-2"></textarea>
        <input type="file" name="picture" id="picture" class="form-control m-2">
        <input type="text" placeholder="Link" name="link" id="link" class="form-control m-2">
        <input type="submit" name="submit" value="Create" class="btn btn-success m-2">

    </form>
    </div>
    
    <?php require "../folder/footer.php" ?>
</body>
</html>