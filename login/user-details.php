<?php
    session_start();
    require_once "../actions/db_connect.php";
    require_once "../actions/file_upload.php";
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    } elseif (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    }

    $id = $_GET['id'];
    $body = "";
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $img = "<img src='../uploads/{$row['picture']}' alt='{$row['user_name']}' id='imageUser'>";
    $body .= "
            <h4>ID: {$id}</h4>
            <h4>Username: {$row['user_name']}</h4>
            <h4>Email: {$row['email']}</h4>
            <h4>First Name: {$row['first_name']}</h4>
            <h4>Last Name: {$row['last_name']}</h4>
            <h4>Birth Date: {$row['birth_date']}</h4>
           
            <a href='./update.php?id={$row['id']}' class='btn m-2'>Update</a>
            <a href='delete.php?id={$row['id']}' class='btn m-2'>Delete</a>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require_once "./navbar-login.php" ?>
    </header>
    <div class="container-recipe">
        <div class="head">
            <h1> <?= $row['user_name'] ?></h1>
    
        </div>

        <div class="main d-flex flex-row flex-lg-nowrap flex-md-wrap flex-sm-wrap">
            <div class="flex-grow-1 m-lg-3 m-md-1 m-sm-1 imageDivUser">
                <?= $img; ?>
            </div>
            <div class="m-lg-3 textsDiv">
                <div class="textR">
                    <div class="textInner">
                        <?= $body; ?>
                    </div>                        
                </div>
            </div>
        </div>

    </div>


    <?php require_once "../folder/footer.php" ?> 
</body>
</html>