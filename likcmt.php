<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

error_reporting(0);

    $name = $_SESSION["username"];
    $like = $_POST['like'];
    $row_id = $_POST['row_id'];
    $unlike = 0;
    if(isset($like) && $like == 1){
        $des="hi";
        $sql = "SELECT  * FROM likes";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["name"]==$name && $_POST['row_id']==$row_id){
                    $des="no";
                }
            }
            echo "$des";
            if($des=="no"){
                $sql = "DELETE FROM likes where name = '$name' and parent_id = '$row_id'";
                $result = mysqli_query($link, $sql);
            }
            else{
                $sql = "INSERT INTO likes (parent_id,name,likes) VALUES('$row_id','$name','$like')";
                $result = mysqli_query($link, $sql);
            }
        }
    header("location: forum.php");
    }

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($link, $sql);
    $user_id = mysqli_fetch_assoc($result);



    $reply = $_POST['reply'];
    $row_sector = $_POST['row_sector'];
    if(isset($reply) && $reply != ''){
        $sql = "INSERT INTO reply (parent_id, name, sector,comment) VALUES ('$row_id','$name', '$row_sector', '$reply')";
        $result=mysqli_query($link,$sql);
    }
    $sql = "SELECT * FROM users WHERE username = $name";
    $result = mysqli_query($link, $sql);
    $user_id = mysqli_fetch_assoc($result);
    header("location: forum.php");
?>