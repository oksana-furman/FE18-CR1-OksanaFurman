<?php
require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $cuisine = $_POST['cuisine'];
    $prep_time = $_POST['prep_time'];
    $cook_time = $_POST['cook_time'];
    $total_time = $_POST['total_time'];
    $servings = $_POST['servings'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $link = $_POST['link'];
    $uploadError = '';

    $picture = file_upload($_FILES['picture']);

    if ($picture->error == 0) { # you change img
            $sqlUpdate = "UPDATE `desserts` SET `name`='$name',`type`='$type',`cuisine`='$cuisine',`prep_time`='$prep_time',`cook_time`='$cook_time',`total_time`='$total_time',`servings`=$servings,`ingredients`='$ingredients',`instructions`='$instructions',`picture`='$picture->fileName',`link`='$link' WHERE id = $id";
        if ($_POST['picture'] != "default.png") {
            unlink("../img/{$_POST['picture']}");
        }
    } else { # you don't change the image
        $sqlUpdate = "UPDATE `desserts` SET `name`='$name',`type`='$type',`cuisine`='$cuisine',`prep_time`='$prep_time',`cook_time`='$cook_time',`total_time`='$total_time',`servings`=$servings,`ingredients`='$ingredients',`instructions`='$instructions',`link`='$link' WHERE id = $id";
    }
    if (mysqli_query($connect, $sqlUpdate) == true) { 
        $class = "success";
        $message = "The recipe \"$name\" was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        header("refresh:5;URL=../components/index.php");
    } else {
        $class = "danger";
        $message = "Error while updating the recipe \"$name\" : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ./error.php");
}
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
        <?php require "../folder/navbar.php" ?>
    </header>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class;?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
           <p><?php echo ($uploadError) ?? ''; ?></p>
           <!-- <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
           <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a> -->
        </div>
    </div>

    <?php require "../folder/footer.php" ?>
</body>
</html>