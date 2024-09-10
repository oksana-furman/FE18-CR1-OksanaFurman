<?php
    session_start();
    require_once "../actions/db_connect.php";
    require_once "../actions/file_upload.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    if (isset($_SESSION['adm'])) {
        header("Location: dashboard.php");
        exit;
    }

    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    }
    $sql = "SELECT * FROM users WHERE id = {$_SESSION['user']}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
<div class="wrap">
    <header>
        <?php require_once "./navbar-login.php" ?>  
    </header>
    <div class="wrapper p-3">
        <h1>Welcome Back, <?= $row['user_name']; ?></h1>
        <div id="hero" class="d-flex align-items-center">
            <div class="imgDiv flex-shrink-0">
                <img src="../uploads/<?= $row['picture']; ?>" alt="<?= $row['user_name']; ?>" class="userImage">
            </div>
            <div class="txtDiv flex-grow-1 ms-3">
                <p>Hello, <?= $row['user_name']; ?>!</p>
                <a href="./logout.php?logout" class="btn">Sign Out</a>
                <a href="./update.php?id=<?= $_SESSION['user'] ?>" class="btn">Update your profile</a>   
            </div>
            <div></div>
        </div>
    </div>
    <?php require_once "../folder/footer.php" ?> 
    </div>
</body>
</html>