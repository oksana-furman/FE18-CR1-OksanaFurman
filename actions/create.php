<?php
    session_start();
    require_once "./db_connect.php";
    // verification of the user
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: ../index.php");
    } 
    if (isset($_SESSION['user'])) {
        header("Location: ../home.php");
    }
    // $print = "";
    $sql = "SELECT DISTINCT `type` FROM desserts";
    $result = mysqli_query($connect, $sql);
    $option1 = "";

    // print the type of the dessert as a selectable option
    while ($row = mysqli_fetch_assoc($result)) {
        $option1 .= "
        <option value=''>{$row['type']}</option>";
    }

    $sql2 = "SELECT DISTINCT cuisine FROM desserts";
    $result2 = mysqli_query($connect, $sql2);
    $option2 = "";
    
    // print the kind of cuisine as a selectable option 
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $option2 .= "
        <option>{$row2['cuisine']}</option>";
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
        <?php require_once "./navbar-actions.php" ?>
    </header>
    <div class="headline">
          <h1>Adding a new recipe</h1>  
    </div>

    <div class="container m-auto">

        <form method="post" action="./a_create.php" class="m-auto form-group w-75" enctype="multipart/form-data">
            <!-- field for the name of the dish -->
            <label for="name">Name of the dish</label>
            <input type="text" placeholder="Name of the dish" name="name" id="name" class="form-control border border-dark-subtle m-2">
            <!-- field for the type. 
             type is a selectable option -->
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control border border-dark-subtle m-2">
            <option value="none">Select a type</option>
                <?= $option1; ?>
            </select>
            <!-- field for the cousine -->
            <label for="cuisine">Cuisine</label>
            <input type="text" name="cuisine" id="cuisine" class="form-control border border-dark-subtle m-2" list="cuisines" placeholder="Type in the name of cuisine or choose from the list" style="background:url('../img/caret-down-fill.svg') no-repeat right center; background-color:white">
            <!-- datalist allows to choose from cousines already in the database or to add a new one -->
            <datalist id="cuisines">
                <?= $option2; ?>
            </datalist>
            <!-- field for the preparation time -->
            <label for="prep_time">Preparation time</label>
            <input type="text" placeholder="Preparation time" name="prep_time" id="prep_time" class="form-control border border-dark-subtle m-2">
            <!-- field for the cooking time -->
            <label for="cook_time">Cooking time</label>
            <input type="text" placeholder="Cooking time" name="cook_time" id="cook_time" class="form-control border border-dark-subtle m-2">
            <!-- field for the total time -->
            <label for="total_time">Total time</label>
            <input type="text" placeholder="Total time" name="total_time" id="total_time" class="form-control border border-dark-subtle m-2">
            <!-- field for the number of servings -->
            <label for="servings">Number of servings</label>
            <input type="number" placeholder="Number of servings" name="servings" id="servings" class="form-control border border-dark-subtle m-2">
            <!-- field for the image -->
             <label for="picture">Image</label>
            <input type="file" name="picture" id="picture" class="form-control border border-dark-subtle m-2">
            <!-- field for the link -->
            <label for="link">Link</label>
            <input type="text" placeholder="Link" name="link" id="link" class="form-control border border-dark-subtle m-2">

            <div class="dynamic">
                 <!-- this is where the dynamically created fields for ingredients are printed -->
                <div id="dynamic_field_ingr" class="d-inline w-100 p-2 m-2"></div> 
                <div class="btns m-2">
                    <!-- button to add ingredient -->
                    <button type="button" name="add_ing" id="add_ing" class="btn btn-secondary m-2">Add ingredient</button>
                </div> 
                <!-- this is where the dynamically created fields for instructions are printed --> 
                <div id="dynamic_field_inst" class="d-inline w-100 p-2 m-2"></div> 
                <!-- button to add instruction -->
                <div class="btns m-2">
                    <button type="button" name="add_inst" id="add_inst" class="btn btn-secondary m-2">Add instruction</button>
                </div>
            </div>
            <!-- button to submit the form -->
            <div class="d-flex justify-content-center m-auto">
                <input type="submit" name="create" value="Create" class="btn btn-success m-2">
            </div>
        </form>
    </div>
    <!-- <div class='m-auto'></div> -->
    
    <?php require_once "../folder/footer.php"; ?>
    
    <script>
        $(document).ready(function(){
            var i = 1;
            var s = 1;
            // function for the dynamically created ingredients fields
            $('#add_ing').click(function(){
                $('#dynamic_field_ingr').append('<div id="row_ing'+i+'" class="dynamic-added d-flex flex-column"><div><p class="par m-auto">Ingredient '+i+'</p></div><div class="d-flex flex-row"><textarea name="text_content[]" placeholder="Content" cols="20" rows="5" class="form-control border border-dark-subtle m-2"></textarea><div class="d-flex flex-column m-auto"><input type="hidden" name="text_type[]" id="ingredient" value="ingredient"><select required name="text_status[]" class="form-control border border-dark-subtle m-auto"><option value="entry" selected>Entry</option><option value="headline">Headline</option></select><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="bi bi-x-lg"></i></button></div></div></div>');
                i++;
            }); 
            // function for the dynamically created instructions fields
            $('#add_inst').click(function(){
                $('#dynamic_field_inst').append('<div id="row_inst'+i+'" class="dynamic-added d-flex flex-column"><div><p class="par m-auto">Instruction '+s+'</p></div><div class="d-flex flex-row"><textarea name="text_content[]" placeholder="Content" cols="20" rows="5" class="form-control border border-dark-subtle m-2"></textarea><div class="d-flex flex-column m-auto"><input type="hidden" name="text_type[]" id="instruction" value="instruction"><select required name="text_status[]" class="form-control border border-dark-subtle m-auto"><option value="entry" selected>Entry</option><option value="headline">Headline</option></select><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="bi bi-x-lg"></i></button></div></div></div>');
                i++;
                s++;
            }); 
            // remove button allows to remove addwd entry before submitting the form
            $(document).on('click', '.btn_remove', function(){
                var btn_id = $(this).attr("id");
                $('#row_ing'+btn_id+'').remove();
            });
            $(document).on('click', '.btn_remove', function(){
                var btn_id = $(this).attr("id");
                $('#row_inst'+btn_id+'').remove();
            });
        });
    </script>
</body>
</html>