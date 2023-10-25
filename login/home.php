<?php
    session_start();
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";

    if (isset($_SESSION['adm'])) {
        header("Location: dashboard.php");
        exit;
    }

    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    }

    $res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "../folder/navbar.php" ?>
    </header>

    <div class="container">
        <div class="hero">
            <img src="../img/<?= $row['picture']; ?>" class="rounded-circle m-1">
            <p>Hello, <?= $row['user_name']; ?>!</p>
        </div>
        <div></div>
    </div>



    <?php require "../folder/footer.php" ?> 
</body>
</html>