<?php 

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

if(isset($_POST["Touser"])){
    $_SESSION["Touser"] = $_POST["Touser"];}


error_reporting(0); // For not showing any error

if (isset($_POST['submit'])){ 
    $Toouser = $_SESSION["Touser"];
    $Fromuser = $_SESSION["username"];
    $msg = $_POST['msg']; 
    $sql = "INSERT INTO messages (Fromuser, Touser, Message) VALUES ('$Fromuser', '$Toouser', '$msg')";
    if(mysqli_query($link, $sql)){
        echo "";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}

header("location: ui.php")
?>