<?php
    session_start();
    require_once "./actions/db_connect.php";
    require_once "./actions/file_upload.php";


    $sql = "SELECT * FROM desserts";
    $result = mysqli_query($connect, $sql);
    $body = "";
    if (mysqli_num_rows($result) > 0) {
        // print all recipes
        while($row = mysqli_fetch_assoc($result)) {
            if (!isset($_SESSION['adm'])) {
                $body .= "
                <div class='item'>
                    <a href='details.php?id={$row['id']}'><img src='./img/{$row['picture']}' alt='{$row['name']}' class='image'></a>
                    <div class='itemText'>  
                        <p>{$row['name']}</p>
                    </div>
                </div>";
            } else {
                $body .= "
                <div class='item'>
                    <a href='details.php?id={$row['id']}'><img src='./img/{$row['picture']}' alt='{$row['name']}' class='image'></a>
                    <div class='itemText'>  
                        <p>{$row['name']}</p>
                        <div class='btns'>
                            <a href='./actions/update.php?id={$row["id"]}' class='btn'>Update</a>
                            <a href='./actions/delete.php?id={$row["id"]}' class='btn'>Delete</a>
                        </div>
                    </div>
                </div>";
            }   
        }
    } else {
        // print if there're no recipes
        $body .= " <p>The category is currently empty.</p>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food blog</title>
    <?php require_once './folder/boot.php'?>
</head>

<body>
    <header>
        <?php require_once "./navbar-components.php" ?>
    </header>
    <?php require_once "./folder/hero.php" ?>
    <div class="headline">
        <p>Browsing Category</p>
        <h1>Sweet</h1>
        <div class="btns">
        <!-- type sorting btns -->
        <button class="btn"><a href="./bake.php" class="link">Bake</a></button>
        <button class="btn"><a href="./no_bake.php" class="link">No Bake</a></button>
    </div>
    </div>

    <div class="contSweets flex-wrap flex-lg-row flex-xl-row flex-md-row flex-sm-col m-lg-auto m-md-0 p-md-0 m-sm-0 p-sm-0">
        <!-- print the recipes -->
        <?= $body?>
    </div>

    <?php require_once "./folder/footer.php" ?>

</body>

</html>