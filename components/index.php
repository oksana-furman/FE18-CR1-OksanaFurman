<?php
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    $sql = "SELECT * FROM desserts";
    $result = mysqli_query($connect, $sql);
    $body = "";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            $body .= "
        <div class='item'>
            <a href='details.php?id={$row['id']}' target='_blank'><img src='../img/{$row['picture']}' alt='{$row['name']}' class='image'></a>
            <div class='itemText'>  
                <p>{$row['name']}</p>
                <div class='btns'>
                <a href='../actions/update.php?id={$row["id"]}' class='btn btn-warning'>Update</a>
                <a href='../actions/delete.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
            </div>
            </div>
        </div>";
        }
    } else {
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
    <?php require '../folder/boot.php'?>
</head>

<body>
    <header>
        <?php require "../folder/navbar.php" ?>
    </header>

    <div>
        <!-- type sorting btns -->
    </div>
    <div class="btns">
        <a href="../actions/create.php" class="btn btn-primary">Add a new recipe</a>
    </div>

    <div class="container">
        
        <?= $body?>
    </div>

    <?php require "../folder/footer.php" ?>

</body>

</html>