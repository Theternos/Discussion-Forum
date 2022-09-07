<?php 

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';
error_reporting(0);
$Touser = $_POST['Touser'];
$_SESSION['Touser'] = $_POST['Touser'];
$Toouser = $_SESSION['Touser'];




if (isset($_POST['submit'])){  // Check press or not send Button
    $touser1 = $_POST['mess'];
    $Fromuser = $_SESSION["username"];// Get Name from SESSION
    $msg = $_POST['msg']; // Get msg from form
    $sql = "INSERT INTO messages (Fromuser, Touser, Message) VALUES ('$Fromuser', '$touser1', '$msg')";
    if(mysqli_query($link, $sql)){
        echo "";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}


$retrive = "SELECT Message FROM messages WHERE Touser = '".$_SESSION['Touser']."' ORDER BY id DESC";
echo $retrive;
$result = mysqli_query($link, $retrive);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {?>
                    <br><h6><?php echo $row['Message']; ?></h6>

               <?php }
            }
            else{
                echo 'Start a new Conversation';
            }
            ?>



<html>
    <body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <textarea id="msg" name="msg" placeholder="Type Here..." required></textarea>
            <input type='hidden' name = 'mess' value= '<?php echo $Touser; ?>'>
            <button name="submit" class="btn btnn">Send</button>
        </form>
    </body>
</html>
