<?php

session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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

    if (mysqli_query($link, $sql)) {
        echo "";
    } else {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <style>
        .bo_dy {
            min-height: 120vh;
        }
    </style>
    <title>SLEEK | DASHBOARD</title>
</head>

<body>
    <section class="bo_dy">
        <div class="navibar" id="#forum">
            <img class="logo-cc" src="./assets/logo.png" width="70%" height="70%">
            <div class="logo">
                <h2>SLEEK<span>.</span></h2>
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
                    <button name="Exercise" value="Exercise"><i class="fa fa-dot-circle-o"></i> Exercise</button>
                    <button name="Yoga" value="Yoga"><i class="fa fa-dot-circle-o"></i> Yoga</button>
                    <button name="Laughing_Theraphy" value="Laughing_Theraphy"><i class="fa fa-dot-circle-o"></i> Laughing Theraphy</button>
                    <button name="Fitness" value="Fitness"><i class="fa fa-dot-circle-o"></i> Fitness</button>
                    <button name="Food_and_Diet" value="Food_and_Diet"><i class="fa fa-dot-circle-o"></i> Food and Diet</button>
                    <button name="Health_care" value="Health_care"><i class="fa fa-dot-circle-o"></i> Health Care</button>
                    <button name="Stress_Management" value="Stress_Management"><i class="fa fa-dot-circle-o"></i> Stress Management</button>
                    <button name="Gardening" value="Gardening"><i class="fa fa-dot-circle-o"></i> Power</button>
                    <button name="Agriculture_based" value="Agriculture_based"><i class="fa fa-dot-circle-o"></i> Agriculture Based</button>
                    <button name="Agriculture_based" value="Agriculture_based"><i class="fa fa-dot-circle-o"></i> Gardening</button>
                    <button name="Health_Workshops" value="Health_Workshops"><i class="fa fa-dot-circle-o"></i> Health Workshops</button>
                    <button name="Others" value="Others"><i class="fa fa-dot-circle-o"></i> Others</button>
                </form>
            </div>

            <center>
                <div class="wrapper">
                    <form action="" method="POST" class="form">
                        <div class="input-group textarea">
                            <p class="p_down">What do you want to ask or share?</p>
                            <textarea id="comment" name="comment" placeholder="Type Here..." required></textarea>
                        </div>
                        <div class="input-group">
                            <div class="dropdown_cntnt">
                                <p for="Selecting Sector">Select your Sector:</p>
                                <select id='input' name="sector">
                                    <option value='Exercise'>Exercise</option>
                                    <option value="Yoga">Yoga</option>
                                    <option value="Laughing_Theraphy">Laughing Theraphy</option>
                                    <option value="Fitness">Fitness</a>
                                    <option value="Food_and_Diet">Food and Diet</option>
                                    <option value="Health_care">Health Care</option>
                                    <option value="Stress_Management">Stress Management</option>
                                    <option value="Gardening">Gardening</option>
                                    <option value="Health_Workshops">Health Workshops</option>
                                </select>
                            </div>

                            <button name="submit" class="btn btnn">Publish</button>
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
                        $value11 = $_POST['Oil_gas'];
                        $value12 = $_POST['Others'];

                        if ($value1 == "" && $value2 == "" && $value3 == "" && $value4 == "" && $value5 == "" && $value6 == "" && $value7 == "" && $value8 == "" && $value9 == "" && $value10 == "" && $value11 == "" && $value12 == "") {
                            $sql = "SELECT * FROM comments ORDER BY id DESC";
                        } else {
                            $sql = "SELECT * FROM comments WHERE sector = '$value1$value2$value3$value4$value5$value6$value7$value8$value9$value10$value11$value12' ORDER BY id DESC";
                        }

                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>
                                <div class="single-item">
                                    <div class="cmt_user">
                                        <div class="circle2">
                                            <h5>
                                                <?php
                                                $name = $row['name'];
                                                $f_letter = strtoupper($name[0]);
                                                echo $f_letter;
                                                $row_id = $row['id'];
                                                $sqll = "SELECT COUNT(likes) AS 'count' FROM likes WHERE parent_id = $row_id";
                                                $resultt = mysqli_query($link, $sqll);
                                                $roww = mysqli_fetch_assoc($resultt);
                                                $count = $roww['count'];
                                                ?>
                                            </h5>
                                        </div>
                                        <form action="chat.php" method="POST" class="form">
                                            <input type="hidden" name='Touser' value='<?php echo $row['name']; ?>'>
                                            <button class="reply_username" name="user_btn">
                                                <h6><?php echo $row['name']; ?></h6>
                                            </button>
                                        </form>

                                    </div>
                                    <p><?php echo $row['comment']; ?></p>
                                    <div class="lcr">
                                        <table class="lke_rply">
                                            <tr>
                                                <td>
                                                    <form action="likcmt.php" method="POST" class="form">
                                                        <input type="hidden" name="like" value="1">
                                                        <input type="hidden" name="row_id" value="<?php echo $row['id'] ?>">
                                                        <button class="like_btn"><i class="fa fa-heart"></i> <?php echo $count ?> Likes</button>
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
                                                    </td>
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

                                        while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                            <hr>
                                            <div class="repy">
                                                <div class="cmt_user">
                                                    <div class="circle2">
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
                                                        <button class="reply_username" name="user_btn">
                                                            <h6><?php echo $row1['name']; ?></h6>
                                                        </button>
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

            <div id="container" class="sidebar_right">
                <h3>Chat</h3>
                <div class="search">
                    <span class="fa fa-search"></span>
                    <textarea type="text" autocomplete="off" class="search_chat" id="live_search" name="comment" placeholder="Search Here..." required></textarea>
                    <?php for ($w = 0; $w < 3; $w++) { ?>
                        <p id="searchresult"></p>
                    <?php
                    } ?>

                </div>
                <?php
                $name = $_SESSION["username"];
                $sql = "SELECT username FROM users WHERE username != '$name' ORDER BY username";
                $result = mysqli_query($link, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="single_item">
                            <form action="chat.php" method="POST" class="form">
                                <input type="hidden" name='Touser' value='<?php echo $row['username']; ?>'>
                                <button class="usr_display" name="user_btn">
                                    <h6><?php echo $row['username']; ?></h6>
                                </button>
                            </form>
                        </div>


                <?php

                    }
                }

                ?>
            </div>

        </section>
    </section>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                if (input != "") {
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: {
                            input: input
                        },

                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                            $("#searchresult").css("padding-left", "33px");
                            $("#searchresult").css("padding-bottom", "10px");
                        }
                    }); //  return databases
                } else {
                    $("#searchresult").css("display", "none");

                }
            });
        });
    </script>

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