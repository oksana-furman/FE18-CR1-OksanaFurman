<?php
    session_start();
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    require "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    } elseif (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    }
 
    $id = $_SESSION['adm'];
    $status = 'adm';
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 = "SELECT * FROM users WHERE status != '$status'";
    $result2 = mysqli_query($connect, $sql2);


    $tbody = ""; 
    
    if ($result2->num_rows > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $tbody .= "
            <tr>
                <th scope='row'><img src='./img/{$row2['picture']}' alt='{$row2['user_name']}' class='rounded-circle'  height='50px'></th>
                <td>{$row2['user_name']}</td>
                <td>{$row2['email']}</td>
                <td>{$row2['first_name']}</td>
                <td>{$row2['last_name']}</td>
                <td>{$row2['birth_date']}</td>
                <td>
                    <a href='./update.php?id={$row2['id']}' class='btn m-2'>Update</a>
                    <a href='delete.php?id={$row2['id']}' class='btn m-2'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php require './folder/boot.php'?>
</head>
<body>
    <div class="wrap">
        <header>
            <?php require "./navbar.php" ?>
        </header>
        <div class="wrapper">

            <div id="hero" class="d-flex align-items-center">
                <div class="imgDiv flex-shrink-0">
                    <img class="userImage m-2" src="./uploads/<?= $row['picture']; ?>" alt="<?= $row['user_name']; ?>">
                </div>
                <div class="txtDiv flex-grow-1 ms-3">
                    <p>Administrator</p>
                    <p>Hello, <?= $row['user_name']; ?></p>
                    <a class="btn m-2" href="logout.php?logout">Sign Out</a>
                    <a class="btn m-2" href="update_profile.php?id=<?= $_SESSION['adm'] ?>">Update your profile</a>
                </div>
            </div>
            
            <div class="users">
                <h3>Users</h3>
                <table class="table table-hover table-borderless w-100">
                    <thead>
                        <tr>
                        <th scope="col">Picture</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Date of birth</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php require "./folder/footer.php" ?> 
    </div>
</body>
</html>