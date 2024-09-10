<?php
    session_start();
    require_once "../actions/db_connect.php";
    require_once "../actions/file_upload.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/db_connect.php";
    // require_once "C:/xampp/htdocs/back-end/1/FE18-CR1-OksanaFurman/actions/file_upload.php";

    // verification of the user
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    } elseif (isset($_SESSION['user'])) {
        header("Location: home.php");
        exit;
    }
 
    $id = $_SESSION['adm'];
    $status = 'adm';
    $tbody = ""; 
    $tbodySmall = ""; 
    $count = 1;

    // admin profile info
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // user profiles info
    $sql2 = "SELECT * FROM users WHERE status != '$status'";
    $result2 = mysqli_query($connect, $sql2);
    
    if ($result2->num_rows > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $tbody .= "
            <tr>
                <td>{$count}</td>
                <th scope='row'><img src='../uploads/{$row2['picture']}' alt='{$row2['user_name']}' class='rounded-circle'  width='70px' height='70px'></th>
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
            $tbodySmall .= "
            <tr>
            <td>{$count}</td>
            <td>{$row2['email']}</td>
            <td>
                <a href='./user-details.php?id={$row2['id']}' class='btn m-2'>More</a>
            </td>
        </tr>";
            $count++;

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
    <?php require_once '../folder/boot.php'?>
</head>
<body>
    <div class="wrap">
        <header>
            <?php require_once "./navbar-login.php" ?>
        </header>
        <div class="wrapper">

            <div id="hero" class="d-flex align-items-center">
                <div class="inner">
                    <div class="imgDiv flex-shrink-0">
                        <img class="userImage m-2" src="../uploads/<?= $row['picture']; ?>" alt="<?= $row['user_name']; ?>">
                    </div>
                    <div class="txtDiv flex-grow-1 ms-3">
                        <div class="text">
                             <p>Administrator</p>
                            <p>Hello, <?= $row['user_name']; ?></p>
                        </div>
                       
                        <div class="but">
                             <a class="btn m-2" href="logout.php?logout">Sign Out</a>
                            <a class="btn m-2" href="update.php?id=<?= $_SESSION['adm'] ?>">Update profile</a>
                        </div>
                       
                    </div>
                </div>
                
            </div>
            
            <div class="userWrap">
                <div class="users">
                    <h3>Users</h3>
                    <table class="table table-responsive table-hover table-borderless w-100">
                        <thead>
                            <tr>
                            <th scope="col">№</th>
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
                <div class="usersSmall">
                    <h3>Users</h3>
                    <table class="table table-responsive table-hover table-borderless w-100">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $tbodySmall ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        
    </div>
    <?php require_once "../folder/footer.php" ?> 
</body>
</html>