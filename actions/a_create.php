<?php
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    if ($_POST['submit']) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $cuisine = $_POST['cuisine'];
        $prep_time = $_POST['prep_time'];
        $cook_time = $_POST['cook_time'];
        $total_time = $_POST['total_time'];
        $servings = $_POST['servings'];
        $ingredients = $_POST['ingredients'];
        $instructions = $_POST['instructions'];
        $picture = file_upload($_FILES['picture']);
        $link = $_POST['link'];

        // $sql = "INSERT INTO `desserts`(`name`, `type`, `cuisine`, `prep_time`, `cook_time`, `total_time`, `servings`, `ingredients`, `instructions`, `picture`, `link`) VALUES ('$name', '$type', '$cuisine', '$prep_time', '$cook_time', '$total_time', $servings,  '$ingredients', '$instructions', '$picture->fileName', '$link')";
        $sql = "INSERT INTO `desserts`(`name`, `type`, `cuisine`, `prep_time`, `cook_time`, `total_time`, `servings`, `ingredients`, `instructions`, `picture`, `link`) VALUES ('$name','$type','$cuisine','$prep_time','$cook_time','$total_time',$servings,'$ingredients','$instructions','$picture->fileName','$link')";
       
        if (mysqli_query($connect, $sql)) {
            $class = "success";
            $message = "Recipe for '$name' was successfully added.";
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
            header( "refresh:5;URL=../components/index.php" );
        } else {
            $class = "danger";
            $message = "Error while adding recipe. Try again: <br>" . $connect->error;
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        }
        // mysqli_close($connect);
    } else {
        header("location: ./error.php");
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
            <?php require "../folder/navbar.php" ?>
        </header>

        <div class="errorMessage">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <h1 class="mt-3 mb-3"><?= $message; ?></h1>
               <h3 class="mt-3 mb-3"><?= $uploadError; ?></h3>
            </div>
        </div>
        

        <?php require "../folder/footer.php" ?>
    </body>
    </html>
