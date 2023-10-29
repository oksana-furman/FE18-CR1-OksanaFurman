*<?php
    require_once "./db_connect.php";
    session_start();
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: ../index.php");
    } 
    if (isset($_SESSION['user'])) {
        header("Location: ../home.php");
    }

    $sql = "SELECT distinct type FROM desserts";
    $result = mysqli_query($connect, $sql);

    $option1 = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $option1 .= "
        <option value=''>{$row['type']}</option>";
    }

    $sql2 = "SELECT distinct cuisine FROM desserts";
    $result2 = mysqli_query($connect, $sql2);
    $option2 = "";
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $option2 .= "
        <option>{$row2['cuisine']}</option>";
    }
    
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
        <?php require "../components/navbar.php" ?>
    </header>
    <div class="headline">
          <h1>Adding a new recipe</h1>  
    </div>

    <div class="container m-auto">

        <form method="post" action="./a_create.php" class="m-auto" enctype="multipart/form-data">

            <input type="text" placeholder="Name of the dish" name="name" id="name" class="form-control m-2">

            <!-- <label for="type">Type</label> -->
            <select name="type" id="type" class="form-control m-2">
            <option value="none">Select a type</option>";
                <?= $option1; ?>
            </select>

            <!-- <label for="cuisine">Cuisine</label> -->
            <input type="text" name="cuisine" id="cuisine" class="form-control m-2" list="cuisines" placeholder="type the name of cuisine or chose from the list" style="background:url('../img/caret-down-fill.svg') no-repeat right center; background-color:white">
            <datalist id="cuisines">
                <?= $option2; ?>
            </datalist>
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