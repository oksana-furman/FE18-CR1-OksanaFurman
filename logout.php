<?php
    session_start();

    if (!isset($_SESSION['user']) && !isset($_SESSION['adm'])) {
        header("Location: index.php");
        exit;
    } 

    if (isset($_GET['logout'])) {
        unset($_SESSION['adm']);
        unset($_SESSION['user']);

        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
?>