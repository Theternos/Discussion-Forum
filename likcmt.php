<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

error_reporting(0);


    $like = $_POST['like'];
    $row_id = $_POST['row_id'];
    if(isset($like) && $like == 1){
            $sql = "UPDATE comments set likes = likes + 1 where id = '".$row_id."'"; 
            $result=mysqli_query($link,$sql);
    }

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($link, $sql);
    $user_id = mysqli_fetch_assoc($result);



    $reply = $_POST['reply'];
    $row_id = $_POST['row_id'];
    $row_sector = $_POST['row_sector'];
    $name = $_SESSION["username"]; // Get Name from form
    if(isset($reply) && $reply != ''){
        $sql = "INSERT INTO reply (parent_id, name, sector,comment) VALUES ('$row_id','$name', '$row_sector', '$reply')";
        $result=mysqli_query($link,$sql);
    }
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($link, $sql);
    $user_id = mysqli_fetch_assoc($result);
    header("location: forum.php")

?>