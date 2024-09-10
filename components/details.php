<?php
    session_start();

    require_once '../actions/db_connect.php';

    $id = $_GET['id'];
    $body = "";
    if (isset($_SESSION['adm'])) {
        $adm = "d-block";
    } else {
        $adm = "d-none";
    }

    #first querry for recipe 
    $sql = "SELECT * FROM desserts WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $img = "<img src='../img/{$row['picture']}' alt='{$row['name']}' id='image'>";

    #  class='object-fit-fill'
    
    #second querry for ingredients 
    $sql1 = "SELECT * FROM text WHERE fk_dessert_id = $id AND text_type = 'ingredient'";
    $result1 = mysqli_query($connect, $sql1);

    #third querry for instructions 
    $sql2 = "SELECT * FROM text  WHERE fk_dessert_id = $id AND text_type = 'instruction'";
    $result2 = mysqli_query($connect, $sql2);

    $body .= "<h4>Type: {$row['type']}</h4>
            <h4>Cuisine: {$row['cuisine']}</h4>
            <h4>Preparation time: {$row['prep_time']}</h4>
            <h4>Cooking time: {$row['cook_time']}</h4>
            <h4>Total time: {$row['total_time']}</h4>
            <h4>Servings: {$row['servings']}</h4>
            <h4 class='{$adm}'>From: <a href='{$row['link']}' class='link' target='blank'>{$row['link']}</a></h4>";

    $text = "";
    $text2 = "";
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $text_id = $row1['text_id'];
        $class = "";
        if ($row1['text_status'] == "entry") {
            $class = "ingredient";
            $text .= "<li class='{$class}'>
                        <input type='checkbox' name='list' id=''{$text_id}>
                        <label for='{$text_id}' class='label'> {$row1['text_content']}</label>
                    </li>";
        } else {
            $class = "headline";
                $text .= "<li class='{$class}'>{$row1['text_content']}</li>";
        }
            
    }
    $counter = 1;
    while ($row2 = mysqli_fetch_assoc($result2)) {
            if ($row2["text_status"] == "headline") {
                $class = "headline";
                $text2 .= "<li class='{$class}'>{$row2['text_content']}</li>";
            } else {
                $class = "instruction";
                $text2 .= "<li class='{$class}'><span>{$counter}.</span> {$row2['text_content']}</li>";
            $counter++;
            }
            
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <?php require_once "./navbar-components.php" ?>

    <div class="container-recipe">
        <!-- <div class="d-flex flex-column"> -->
            <div class="head">
                <h1> <?= $row['name'] ?></h1>

                <!-- this div is only displayed for admin -->
                <div class='btns <?= $adm ?> text-center'>
                    <a href='../actions/update.php?id=<?=$row["id"]?>' class='btn'>Update</a>
                    <a href='../actions/delete.php?id=<?=$row["id"]?>' class='btn'>Delete</a>
                </div>
            </div>
        
            <div class="main d-flex flex-row flex-lg-nowrap flex-md-wrap flex-sm-wrap w-75">
                <div class="flex-shrink-0 m-3 imageDiv">
                    <?= $img; ?>
                </div>
                <div class="flex-grow-1 m-3 textsDiv">

                    <!-- main info from desserts table. link is only vsible to admin -->
                    <div class="textR">
                        <div class="textInner">
                            <?= $body; ?>
                        </div>    
                    </div>

                </div>
            </div>

            <div class="entries entries2">
                    <!-- ingredients from text table -->
                    <h2 class="big">Ingredients:</h2>
                    <ul>
                        <?= $text; ?>
                    </ul>
                </div>

                <div class="entries">
                    <!-- instructions from text table -->
                    <h2 class="big">Instructions:</h2>
                    <ol start="<?= $counter; ?>">
                        <?= $text2; ?>
                    </ol>
                </div>

        <!-- </div> -->
    </div>

    
    <?php require_once "../folder/footer.php" ?>
</body>
</html>