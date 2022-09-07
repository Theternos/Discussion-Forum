<?php 

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$name = $_SESSION["username"]; // Get Name from form
	$comment = $_POST['comment']; // Get Comment from form
    $sector = $_POST['sector']; // Getting Sector
	$sql = "INSERT INTO comments (name, sector,comment,likes) VALUES ('$name', '$sector', '$comment',0)";

	if(mysqli_query($link, $sql)){
		echo "";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,500,1,-25" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,1,200" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<style>
    .bo_dy{
        min-height: 120vh;
    }
</style>
	<title>LINESTO | DASHBOARD</title>
</head>
<body>
    <section class="bo_dy">
        <div class="navibar" id="#forum">
            <img class="logo-cc" src="./assets/logo.png" width="80%" height="80%">
            <div class="logo">
                <h1>LINESTO<span>.</span></h1>
            </div>
            <div class="nav__links">
                <a href="./forum.php" class="active nav__link">Dashboard</a>
                <a href="./main.php#home" class="nav__link">Home</a>
                <a href="./main.php#services" class="nav__link">Services</a>
                <a href="./main.php#about" class="nav__link">About</a>
                <a href="#contact" class="nav__link">Contact Us</a>
                <div class="dropdown">
                <a class="dropbtn" href="profile.php">
                    <div class="circle1">
                        <h5>
                            <?php
                                $name = $_SESSION['username'];
                                $f_letter = strtoupper($name[0]);
                                echo $f_letter; 
                            ?>
                        </h5>
                    </div>
                </a>
                <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            
            </div>
        </div>
        <section class="forum">
            <div class="sidebar_left">
                <h3>Spaces</h3>
                <form class="sidebar_content" method="POST">
                    <button name="All" value="All"><i class="fa fa-dot-circle-o"></i> All</button>
                    <button name="Auto_ancilliary" value="Auto_ancilliary"><i class="fa fa-dot-circle-o"></i> Auto & Ancilliary</button>
                    <button name="Financial_banking" value="Financial_banking"><i class="fa fa-dot-circle-o"></i> Financial & Banking</button>
                    <button name="Consumer_durables" value="Consumer_durables"><i class="fa fa-dot-circle-o"></i> Consumer Durables</button>
                    <button name="Textiles" value="Textiles"><i class="fa fa-dot-circle-o"></i> Textiles</button>
                    <button name="FMCG" value="FMCG"><i class="fa fa-dot-circle-o"></i> FMCG</button>
                    <button name="Health_care" value="Health_care"><i class="fa fa-dot-circle-o"></i> Health Care</button>
                    <button name="Metal_mining" value="Metal_mining"><i class="fa fa-dot-circle-o"></i> Metal & Mining</button>
                    <button name="Power" value="Power"><i class="fa fa-dot-circle-o"></i> Power</button>
                    <button name="Agriculture_based" value="Agriculture_based"><i class="fa fa-dot-circle-o"></i> Agriculture Based</button>
                    <button name="Service_sector" value="Service_sector"><i class="fa fa-dot-circle-o"></i> Service Sector</button>
                    <button name="Oil_gas" value="Oil_gas"><i class="fa fa-dot-circle-o"></i> Oil & Gas</button>
                    <button name="Others" value="Others"><i class="fa fa-dot-circle-o"></i> Others</button>
                </form>
            </div>

            <center><div class="wrapper">
                <form action="" method="POST" class="form">
                    <div class="input-group textarea">
                        <p class="p_down">What do you want to ask or share?</p>
                        <textarea id="comment" name="comment" placeholder="Type Here..." required></textarea>
                    </div>
                    <div class="input-group">
                        <div class="dropdown_cntnt">
                            <p for="Selecting Sector">Select your Sector:</p>
                            <select id='input' name="sector">
                                <option value ='Auto_ancilliary'>Auto & Ancilliary</option>
                                <option value="Financial_banking">Financial & Banking</option>
                                <option value="Consumer_durables">Consumer Durables</option>
                                <option value="Textiles">Textiles</a>
                                <option value="FMCG">FMCG</option>
                                <option value="Health_care">Health Care</option>
                                <option value="Metal_mining">Metal & Mining</option>
                                <option value="Power">Power</option>
                                <option value="Agriculture_based">Agriculture</option>
                                <option value="Service_sector">Service Sector</option>
                                <option value="Oil_gas">Oil & Gas</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
            
                        <button name="submit" class="btn btnn">Post a Question</button>
                    </div>
                </form>
                
            </div>
        
            <div class="wrapper">
                <h3 class="discussions">Recent Discussions: </h3>
            <div class="prev-comments">

                    <?php 
                    $value1 = $_POST['Auto_ancilliary'];
                    $value2 = $_POST['Financial_banking'];
                    $value3 = $_POST['Consumer_durables'];
                    $value4 = $_POST['Textiles'];
                    $value5 = $_POST['FMCG'];
                    $value6 = $_POST['Health_care'];
                    $value7 = $_POST['Metal_mining'];
                    $value8 = $_POST['Power'];
                    $value9 = $_POST['Agriculture_based'];
                    $value10 = $_POST['Service_sector'];
                    $value11= $_POST['Oil_gas'];
                    $value12 = $_POST['Others'];
                    
                    
                    $sql = "SELECT * FROM comments WHERE sector = '$value1$value2$value3$value4$value5$value6$value7$value8$value9$value10$value11$value12' ORDER BY id DESC";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            

                    ?>   
                <div class="single-item">
                    <div class="cmt_user"><div class="circle2">
                        <h5>
                            <?php
                                $name = $row['name'];
                                $f_letter = strtoupper($name[0]);
                                echo $f_letter; 
                            ?>
                        </h5>
                    </div>
                        <h4><a href=""><?php echo $row['name']; ?></a></h4>
                    </div>
                        <p><?php echo $row['comment']; ?></p><div class="lcr">
                        <table class="lke_rply">
                            <tr>
                                <td>
                                    <form action="likcmt.php" method="POST" class="form">
                                        <input type="hidden" name="like" value="1"> 
                                        <input type="hidden" name="row_id" value="<?php echo $row['id'] ?>"> 
                                        <button class="like_btn"><i class="fa fa-heart"></i> <?php  echo $row['likes'] ?> Likes</button>
                                    </form>
                                </td>
                                    <form action="likcmt.php" method="POST" class="form">
                                    <td>
                                        <div class="search"> 
                                            <textarea class="reply_inpt" name="reply" placeholder="Add a comment..." value="" required></textarea>
                                            <button class="reply_btn"><span class="fa fa-send"></span></button>
                                        </div>
                                        <input type="hidden" name="row_id" value="<?php echo $row['id'] ?>"> 
                                        <input type="hidden" name="row_sector" value="<?php echo $row['sector'] ?>"> 
                                    </form>
                            </tr>
                        </table>

                    </div>
                        
                        <p class="created_at"><?php echo $row['created_at']; ?></p>
                <?php
                    $row_idd = $row['id'];
                    $sql1 = "SELECT * FROM reply WHERE parent_id = $row_idd ORDER BY id DESC limit 3";
                    $result1 = mysqli_query($link, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        
                        while ($row1 = mysqli_fetch_assoc($result1)) {?>
                        <hr>
                            <div class="repy">
                            <div class="cmt_user"><div class="circle2">
                        <h5>

                            <?php
                                $name = $row1['name'];
                                $f_letter = strtoupper($name[0]);
                                echo $f_letter; 
                            ?>
                        </h5>
                    </div>
                        <h4><a href=""><?php echo $row1['name']; ?></a></h4>
                    </div>
                                <p><?php echo $row1['comment']; ?></p>
                        <p class="created_at_reply"><?php echo $row1['created_at']; ?></p>

                            </div>
                            

                      <?php     
                        }
                    }
               
                    ?>  
                    </div>
                    
<?php
                }
            }
            ?>
                </div>         
            </div>
        </center>
    
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
                $chatuser = $_POST[$row['username']];
                echo $chatuser;
                ?>
                <?php

                    }
                }
                
                ?>
            </div>
            
        </section>
    </section>
	<footer id="contact" class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Bannari Amman Institute of Technology</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+91 8072677947</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>linesto.in@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="./assets/full_logo_bg.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p></p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About us</a></li>
                                <li><a href="#services">Our Services</a></li>
                                <li><a href="#contact">Contact us</a></li>
                            </ul>   
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2022, All Right Reserved <a href="">Kavin & Anusuya</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>