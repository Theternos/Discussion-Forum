<?php 

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';

error_reporting(0);






?>


<html>
    <head>  
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">
    </head>


    <body>  
        <div class="chat_total">
            <div class="chat_title">
                <div class="circle1">
                    <h5>
                        <?php
                            $name = $_SESSION['Touser'];
                            $f_letter = strtoupper($name[0]);
                            echo $f_letter; 
                        ?>
                    </h5>
                </div>
                <?php

                $a = $_SESSION['Touser'];
                $b = $_SESSION['username'];
                $retrive = "SELECT Message,Touser,Fromuser FROM messages WHERE Touser IN ('$a','$b') and Fromuser IN ('$b','$a') ORDER BY created_at desc";?>
                
                <p>
                    <?php echo $_SESSION['Touser']; ?>
                </p>
            </div>
        <div class="conversation">
                <form action="chat.php" method="POST" class="form"  >
                    <textarea class="search_chat chattt" id="msg" name="msg" placeholder="Type Here..." required></textarea>
                    <input type='hidden' name = 'mess' value= '<?php echo $_SESSION['Touser']; ?>'>
                    <button name="submit" type="submit"class="reply_bttn"><span class="fa fa-send"></span></button>
                </form>
            </div>
            <div class="sidebar_right chatter">
                
                
                <?php

                $result = mysqli_query($link, $retrive);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <br>
                        <?php
                        if($row['Touser'] ==$a  &&  $row['Fromuser'] == $b){?>

                        <div class="fromuser">
                            <p>
                                <?php echo $row['Message']; ?>
                            </p>
                        </div>
                        <?php
                        }

                        if($row['Fromuser'] == $a && $row['Touser'] == $b){?>
                        <div class="touser">
                            <p>
                                <?php echo $row['Message']; ?>
                            </p>
                        </div> 
                        <?php 
                        }
                        ?>
                        <?php 
                    }
                }
                else{
                    echo '<br> Start a new Conversation';
                }?>

                
            </div>
            
        </div>
    </body>
</html>
