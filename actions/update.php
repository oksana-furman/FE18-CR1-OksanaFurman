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

    $id = $_GET['id'];
    $sql = "SELECT * FROM `desserts` WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $class = "";
    $message = "";
    $status = "";
    $currentStatus = $row['status'];
    $statusOptions = "";
   
    # set the status for the recipe of the month
    $sqlStatus = "SELECT DISTINCT `status` FROM `desserts`";
    $resultStatus = mysqli_query($connect, $sqlStatus);
    while ($row_s = mysqli_fetch_assoc($resultStatus)) {
        $value = $row_s['status'];
    
    # Convert 0 to No and 1 to Yes
    $label = ($value == 0) ? "No" : "Yes";
    # Check if the current status matches the value from the database
    $selected = ($currentStatus == $value) ? "selected" : "";
    # print a selectable option
    $statusOptions .= "<option value='$value' $selected>$label</option>";
    }
    
    $sql2 = "SELECT * FROM `text` WHERE fk_dessert_id = $id";
    $result2 = mysqli_query($connect, $sql2);
    $body = "";
    $body2 = "";
    $i = 0;

    $sqlTextStatus = "SELECT DISTINCT `text_status` FROM `text`";
    $resultTextStatus = mysqli_query($connect, $sqlTextStatus);
    
    $sqlTextType = "SELECT DISTINCT `text_type` FROM `text`";
    $resultTextType = mysqli_query($connect, $sqlTextType);

    // outer loop
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $optionTextStatus = "";
        $valueTextStatus = "";
        $currentTextStatus = "";
        $selectedTextStatus = "";
        $labelTextStatus = "";
        $optionTextType = "";
        $valueTextType = "";
        $currentTextType = "";
        $selectedTextType = "";
        $labelTextType = "";
        if ($row2['text_type'] !== "instruction") {
            $body .= "<div class='d-inline w-100'>
            <label>Content Entry $i
            <input type='text' name='text_content$i' value='{$row2['text_content']}' class='form-control m-2 w-50'>
            </label>
            <label>Status
            <select name='text_status$i' class='form-control m-2 w-50'>";
            mysqli_data_seek($resultTextStatus, 0); // Reset the pointer for the 1st inner loop
            while ($rowTextStatus = mysqli_fetch_assoc($resultTextStatus)) {
                $valueTextStatus = $rowTextStatus['text_status'];
                $currentTextStatus = $row2["text_status"];
                $selectedTextStatus = ($currentTextStatus == $valueTextStatus) ? "selected" : "";
                $labelTextStatus = ($valueTextStatus == "entry") ? "entry" : "headline";
                $optionTextStatus .= "<option value='{$valueTextStatus}' $selectedTextStatus>$labelTextStatus</option>";
            }
            $body .= $optionTextStatus . "</select>
            </label>
            <label>Type
             <select name='text_type$i' class='form-control m-2 w-50'>";
            mysqli_data_seek($resultTextType, 0); // Reset the pointer for the 2nd inner loop
            while ($rowTextType = mysqli_fetch_assoc($resultTextType)) {
                $valueTextType = $rowTextType['text_type'];
                $currentTextType = $row2["text_type"];
                $selectedTextType = ($currentTextType == $valueTextType) ? "selected" : "";
                $labelTextType = ($valueTextType == "ingredient") ? "ingredient" : "instruction";
                $optionTextType .= "<option value='{$valueTextType}' $selectedTextType>$labelTextType</option>";
            }
            $body .= $optionTextType . "</select>
            </label>
            </div>";
        } elseif ($row2['text_type'] !== "ingredient") {
            $body2 .= "<input type='text' name='text_content$i' id='id{$row2['text_id']}' value='{$row2['text_content']}' class='form-control m-2 w-50'><br>
            <label>Status
            <input type='text' name='text_status$i' id='text_status' class='form-control m-2 w-50' value='{$row2['text_status']}'>
            </label>
            <label>Type
            <input type='text' name='text_type$i' id='text_type' class='form-control m-2 w-50' value='{$row2['text_type']}'>
            </label>";
        } else {
            $body = "<p>There're no ingredients for this recipe</p>";
            $body2 = "<p>There're no instructions for this recipe</p>";
        }
        $i++;
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

    <div class="alert alert-<?= $class; ?>" role="alert">
        <p><?= $message; ?></p>
    </div>

    <h1 class="headline">Edit the Recipe: <?= $row['name'] ?></h1>
    
    <form action="./a_update.php?len=<?= $i; ?>" method="post" enctype="multipart/form-data" class="form-group m-3">
        <label>Name of the dish
            <input type="text" name="name" id="name" class="form-control m-2" value="<?= $row['name'] ?>">
        </label><br>
        <label>Type of the dish
            <input type="text" name="type" id="type" class="form-control m-2" value="<?= $row['type'] ?>">
        </label><br>
        <label>Cuisine
            <input type="text" name="cuisine" id="cuisine" class="form-control m-2" value="<?= $row['cuisine'] ?>">
        </label><br>  
        <label>Preparation time 
            <input type="text" name="prep_time" id="prep_time" class="form-control m-2" value="<?= $row['prep_time'] ?>">
        </label><br> 
        <label>Cooking time
            <input type="text" name="cook_time" id="cook_time" class="form-control m-2" value="<?= $row['cook_time'] ?>">
        </label><br>
        <label>Total time
            <input type="text" name="total_time" id="total_time" class="form-control m-2" value="<?= $row['total_time'] ?>">
        </label><br>
        <label>Number of servings
            <input type="number" name="servings" id="servings" class="form-control m-2" value="<?= $row['servings'] ?>">
        </label><br>
        <div class="ingredients d-flex row col-3">
            <h3>Ingredients</h3>
            <?= $body; ?>
        </div> 
        <div class="instructions d-flex row col-3">
            <h3>Instructions</h3>
            <?= $body2; ?>
        </div>

        <label>Recipe of the month
            <select name="status" id="status">
                <!-- <option value="0">Choose</option> -->
                <?= $statusOptions ?>  
            </select>
        </label><br>
        <label>Link
            <input type="text" name="link" id="link" class="form-control m-2" value="<?= $row['link'] ?>">
        </label><br>
        <label>
            <input type="file" name="picture" id="picture" class="form-control m-2">
        </label><br>

        <input class="form-control m-2" type="hidden" name="id" value="<?= $row['id'] ?>">
        <input class="form-control m-2" type="hidden" name="text_id" value="<?= $row2['text_id'] ?>">
       
            <input class="form-control m-2" type="hidden" name="picture" value="<?= $row['picture'] ?>">
            <div class="btnDiv">
                <input type="submit" class="btn btn-warning m-2" name="update" value="Update">
            </div>
    </form>

    <?php require_once "../folder/footer.php" ?>
</body>
</html>