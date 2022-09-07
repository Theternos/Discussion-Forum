<?php 


include 'config.php';

error_reporting(0); // For not showing any error

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">

	<title>LINESTO | FORUM</title>
</head>
<body>
<div class="navibar">
        <img class="logo-c" src="./assets/logo.png" width="80%" height="80%">
        <div class="logo">
            <h1>LINESTO<span>.</span></h1>
        </div>
        <div class="nav__links">
            <a href="./index.php#home" class="active nav__link">Home</a>
            <a href="./index.php#services" class="nav__link">Services</a>
            <a href="./index.php#about" class="nav__link">About</a>
            <a href="./index.php#contact" class="nav__link">Contact Us</a>
            <a href="./forum_auth.php" class="nav__link">Forum</a>
            <a href="login.php" class="nav__link">Login</a>
        </div>
    </div>
	<div class="wrapper">
		
		<div class="prev-comments">
			<?php 
			
			$sql = "SELECT * FROM comments";
			$result = mysqli_query($link, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
				<p><?php echo $row['comment']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
</body>
</html>