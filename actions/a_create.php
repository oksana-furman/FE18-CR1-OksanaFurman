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
    $btns = "";
    $message = "";
    $class = "";
    $uploadError = "";
    $fieldsCount = "";
    $order = 1;

    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $cuisine = $_POST['cuisine'];
        $prep_time = $_POST['prep_time'];
        $cook_time = $_POST['cook_time'];
        $total_time = $_POST['total_time'];
        $servings = $_POST['servings'];
        $picture = file_upload($_FILES['picture'], "cake");
        $link = $_POST['link'];
    
        $sql = "INSERT INTO `desserts`(`name`, `type`, `cuisine`, `prep_time`, `cook_time`, `total_time`, `servings`, `picture`, `link`) VALUES ('$name','$type','$cuisine','$prep_time','$cook_time','$total_time',$servings,'$picture->fileName','$link')";

        if (mysqli_query($connect, $sql)) {
             #get the id of created row in the table desserts
             $lastId = mysqli_insert_id($connect);
            //  var_dump($lastId);

            // if the id exists, add the rest of the data to the table text
            if (isset($lastId)) {
                if (!empty($_POST['text_content']) && !empty($_POST['text_type']) && !empty($_POST['text_status'])) {
                    foreach ($_POST['text_content'] as $key => $value) {
                        $text_content = $value;
                        $text_type = $_POST['text_type'][$key];
                        $text_status = $_POST['text_status'][$key];
                       
                        $sqlText = "INSERT INTO `text`(`text_content`, `text_status`, `text_type`, `text_order`, `fk_dessert_id`) VALUES ('$text_content','$text_status','$text_type',$order,$lastId)";
                        
                        mysqli_query($connect, $sqlText);
                        $order++;
                        // if all data added successfully
                        $class = "success";
                        $message = "Recipe '$name' was successfully added.";
                        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
                        header( "refresh:5;URL=../components/index.php" );
                    }
                } else {
                    // if data wasn't added to table text
                    $class = "danger";
                    $message = "Error while adding ingredients or instructions for the recipe. Try again: <br>" . $connect->error;
                    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
                }
               
            } else {
                // if couldn't access the id
                $class = "danger";
                $message = "The id doesn't exist. Try again: <br>" . $connect->error;
                $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
            }
            
           
        } else {
            // if data wasn't added to table dessert
            $class = "danger";
            $message = "Error while adding recipe. Try again: <br>" . $connect->error;
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        }
        mysqli_close($connect);
    } else {
        // if the form wasn't submitted
        header("location: ./error.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adding a new recipe</title>
        <?php require_once '../folder/boot.php'?>
    </head>
    <body>
        <header>
            <?php require_once "../components/navbar.php" ?>
        </header>
    
        <div class="errorMessage">
            <!-- <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div> -->
            <div class="alert alert-<?=$class;?>" role="alert">
               <h1 class="mt-3 mb-3"><?= $message; ?></h1>
               <h3 class="mt-3 mb-3"><?= $uploadError; ?></h3>
               <?= $btns ?>
            </div>
        </div>

        <?php require "../folder/footer.php" ?>
    </body>
    </html>
