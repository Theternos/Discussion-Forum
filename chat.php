<?php 

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

error_reporting(0); // For not showing any error


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

	<title>LINESTO | CHAT</title>
</head>
<body>
<div class="sidebar_right">
			<h3>Chat</h3>
            <div class="search">
                <span class="fa fa-search"></span>
                <textarea class="search_chat" id="comment" name="comment" placeholder="Search Here..." required></textarea>
            </div>
            <?php
            $name = $_SESSION["username"];
            $sql = "SELECT username FROM users WHERE username != '$name' ORDER BY id DESC";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
            <div class="single_item">
            <form action="ui.php" method="POST" class="form">
                <input type="hidden" name='Touser' value='<?php echo $row['username']; ?>'>
                <button name="user_btn" ><h6><?php echo $row['username']; ?></h6></button>
            </form>

            </div>
            
            <?php
                }
            }
            ?>

		</div>
        
</body> 
</html>