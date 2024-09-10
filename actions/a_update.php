<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $cuisine = $_POST['cuisine'];
        $prep_time = $_POST['prep_time'];
        $cook_time = $_POST['cook_time'];
        $total_time = $_POST['total_time'];
        $servings = $_POST['servings'];
        $status = $_POST['status'];
        $link = $_POST['link'];
        $uploadError = '';
        // $len = $_GET['len'];

        $picture = file_upload($_FILES['picture'], "cake");

        #from second table
        // $text_id = $_POST['text_id'];
        // $text_content = $_POST['text_content'];
        // $text_status = $_POST['text_status'];
        // $text_type = $_POST['text_type'];
       

        if ($picture->error == 0) { # you change img
                
                $sqlUpdate = "UPDATE `desserts` SET `name`='$name',`type`='$type',`cuisine`='$cuisine',`prep_time`='$prep_time',`cook_time`='$cook_time',`total_time`='$total_time',`servings`=$servings,`picture`='$picture->fileName',`status`='$status',`link`='$link' WHERE id = $id";
                            

            if ($_POST['picture'] != "default.png") {
                unlink("../img/{$_POST['picture']}");
            }
        } else { # you don't change the image
            $sqlUpdate = "UPDATE `desserts` SET `name`='$name',`type`='$type',`cuisine`='$cuisine',`prep_time`='$prep_time',`cook_time`='$cook_time',`total_time`='$total_time',`servings`=$servings,`status`='$status',`link`='$link' WHERE id = $id";
        }
        mysqli_query($connect, $sqlUpdate);

            # if we choose a new recipe of the month(status = true), the rest should automatically be set to false
        if ($status == 1) {
            $sqlStatus = "UPDATE `desserts` SET `status`= 0 WHERE id <> $id";
            mysqli_query($connect, $sqlStatus);
        } 
        
        # select the ids from second table, so we can update all rows that belong to chosen recipe
        $sqlUpdate2 = "SELECT `text_id` FROM `text` WHERE `fk_dessert_id`= $id";
        $result2 = mysqli_query($connect, $sqlUpdate2);
        

        # $i is needed to differentiate between the names of inputs, because we use a loop to display them in the form
        if ($result2) {
            $len = mysqli_num_rows($result2);
            for ($i=0; $i < $len; $i++) {
                $row = mysqli_fetch_assoc($result2);
                $sqlUpdate3 = "UPDATE `text` SET `text_content`='{$_POST['text_content'.$i]}',`text_status`='{$_POST['text_status'.$i]}',`text_type`='{$_POST['text_type'.$i]}' WHERE `text_id`= $row[text_id]";
                mysqli_query($connect, $sqlUpdate3);
            }
                       
            $class = "success";
                $message = "The recipe \"$name\" was successfully updated";
                $uploadError = ($picture->error !=0) ? $picture->ErrorMessage :'';
                header("refresh:5;URL=../components/index.php");
        } else {
            $class = "danger";
            $message = "Error while updating the recipe \"$name\" : <br>" . mysqli_connect_error();
            $uploadError = ($picture->error !=0) ? $picture->ErrorMessage :'';
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
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require_once "./navbar-actions.php" ?>
    </header>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class;?> w-50" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
           <p><?php echo ($uploadError) ?? ''; ?></p>
           <!-- <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
           <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a> -->
        </div>
    </div>

    <?php require_once "../folder/footer.php" ?>
</body>
</html>