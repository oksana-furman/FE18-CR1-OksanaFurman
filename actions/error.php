<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <?php require '../folder/boot.php'?>
</head>
<body>
    <header>
        <?php require "../components/navbar.php" ?>
    </header>

    <div class="container"> 
        <div class="mt-3 mb-3">
            <h1>Invalid Request</h1>
        </div>
        <div class="alert alert-warning" role="alert">
            <p>You've made an invalid request. Please <a href="../components/home.php" class="alert-link">go back</a> to home page and try again.</p>
        </div>
    </div>


    <?php require "../folder/footer.php" ?>
</body>
</html>