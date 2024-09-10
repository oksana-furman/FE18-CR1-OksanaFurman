<?php 

$hostname = "127.0.0.1"; 
$username = "root";
$password = ""; 
$dbname = "food_blog_2";

// $connect = new mysqli($hostname, $username, $password, $dbname);

// check connection
// if($connect->connect_error) {
//     die("Connection failed: " . $connect->connect_error);
//  }else {
//      echo "Successfully Connected";
//  }

$connect = mysqli_connect($hostname, $username, $password, $dbname);
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}