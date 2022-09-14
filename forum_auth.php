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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,500,1,-25" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,1,200" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

	<title>LINESTO | FORUM</title>
</head>
<body>
		<div class="navibar" id="#forum">
            <img class="logo-cc" src="./assets/logo.png" width="70%" height="70%">
            <div class="logo">
                <h2>LINESTO<span>.</span></h2>
            </div>
            <div class="nav__links">
            <a href="./forum_auth.php" class="active nav__link">Dashboard</a>
			<a href="./index.php#home" class="nav__link">Home</a>
            <a href="./index.php#services" class="nav__link">Services</a>
            <a href="./index.php#about" class="nav__link">About</a>
            <a href="./index.php#contact" class="nav__link">Contact Us</a>
            <a href="login.php" class="nav__link">Login</a>  
            </div>
        </div>
	
		<div class="login-box">
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

            <center>
        
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
                    
                    if($value1 =="" && $value2 =="" && $value3 =="" && $value4 =="" && $value5 =="" && $value6 =="" && $value7 =="" && $value8 =="" && $value9 =="" && $value10 =="" && $value11 == "" && $value12 == "" ){
                    $sql = "SELECT * FROM comments ORDER BY id DESC";

                    }


                    else{
                    $sql = "SELECT * FROM comments WHERE sector = '$value1$value2$value3$value4$value5$value6$value7$value8$value9$value10$value11$value12' ORDER BY id DESC";
                }

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
                    <form action="chat.php" method="POST" class="form">
                        <input type="hidden" name='Touser' value='<?php echo $row['name']; ?>'>
                        <button class="reply_username" name="user_btn"><h6><?php echo $row['name']; ?></h6></button>
                    </form>

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
                    <form action="chat.php" method="POST" class="form">
                        <input type="hidden" name='Touser' value='<?php echo $row1['name']; ?>'>
                        <button class="reply_username" name="user_btn"><h6><?php echo $row1['name']; ?></h6></button>
                    </form>
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
        <div class="sidebar_rightt">
			<img src="banner.png" alt="">
		</div>

		</div>
</body>
</html>