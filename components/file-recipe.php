<?php
    session_start();

    require_once '../actions/db_connect.php';

    if (isset($_SESSION['adm'])) {
            $adm = "d-block";
    } else {
            $adm = "d-none";
    }

    # first querry for recipe
    $sql = "SELECT * FROM `desserts` WHERE `status` = 1";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $img = "<img src='../img/{$row['picture']}' alt='{$row['name']}' id='image' class='object-fit-fill'>";
    $ing = "";
    $inst = "";
    $class = "";
    $counter = 1;

     # second querry for ingredients. number is unknown, so we use the loop
    $sql1 = "SELECT * FROM text WHERE fk_dessert_id = $id AND text_type = 'ingredient'";
    $result1 = mysqli_query($connect, $sql1);

    while ($row1 = mysqli_fetch_assoc($result1)) {
        $text_id = $row1['text_id'];
        if ($row1['text_status'] == "entry") {
            $class = "ingredient";
            $ing .= "<li class='{$class}'>
                        <input type='checkbox' name='list' id=''{$text_id}>
                        <label for='{$text_id}' class='label'> {$row1['text_content']}</label>
                    </li>";
        } else {
            $class = "headline";
            $ing .= "<li class='{$class}'><h2>{$row1['text_content']}</h2></li>";
        } 
    }
     # third querry for instructions. number is unknown, so we use the loop
    $sql2 = "SELECT * FROM text WHERE fk_dessert_id = $id AND text_type = 'instruction'";
    $result2 = mysqli_query($connect, $sql2);
    
    while ($row2 = mysqli_fetch_assoc($result2)) {
        if ($row2['text_status'] == "headline") {
            $class = "headline";
            $inst .= "<li class='{$class}'><h2>{$row2['text_content']}</h2></li>";
        } else {
            $class = "instruction";
            $inst .= "<li class='{$class}'><span>{$counter}.</span> {$row2['text_content']}</li>";
            $counter++;
        }
    }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe of the Month</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <?php require_once "./navbar-components.php" ?>

    <div class="container-recipe">
        <div class="head">
            <h1 class='text-center m-auto d-flex flex-wrap'><?= $row['name'] ?></h1>

            <!-- this div is only displayed for admin -->
            <div class='btns <?= $adm ?>'>
                <a href='../actions/update.php?id=<?= $id ?>' class='btn'>Update</a>
                <a href='../actions/delete.php?id=<?= $id ?>' class='btn'>Delete</a>
            </div>
        </div>
            <!-- main info from desserts table. link is only vsible to admin -->
            <div class="main d-flex flex-row flex-lg-nowrap flex-md-wrap flex-sm-wrap w-75">
                <div class="flex-shrink-0 imageDiv m-3">
                    <?= $img ?>
                </div>
                <div class="flex-grow-1 m-3 textDiv">
                    <div class="textR">
                        
                        <h4>Type: <?= $row['type'] ?></h4>
                        <h4>Cuisine: <?= $row['cuisine'] ?></h4>
                        <h4>Preparation time: <?= $row['prep_time'] ?></h4>
                        <h4>Cooking time: <?= $row['cook_time'] ?></h4>
                        <h4>Total time: <?= $row['total_time'] ?></h4>
                        <h4>Servings: <?= $row['servings'] ?></h4>
                        <h4 class="<?= $adm ?>"> From: <a href="<?= $row['link'] ?>" class="link" target="blank"><?= $row['link'] ?></a></h4>
                    </div>
                </div>
                
            </div>

            <!-- ingredients from text table -->
            <div class="entries entries2">
                <h2 class="big">Ingredients:</h2>
                <ul>
                    <?= $ing; ?>
                </ul>
            </div>

            <!-- instructions from text table -->
            <div class="entries">
                <h2 class="big">Instructions:</h2>
                <ol start="<?= $counter; ?>">  
                    <?= $inst; ?>
                </ol>
            </div>
    </div>

    <?php require_once "../folder/footer.php" ?>

</body>

</html>