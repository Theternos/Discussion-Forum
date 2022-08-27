<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LINESTO | HOME</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,1,0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@40,500,1,-25" /> 

</head>


<body>
<style>
        body{ background-color: #f2f4fe;
              max-height: 100vh; }
    </style>
    <!-- partial:index.partial.html -->
    <div class="navibar">
        <img class="logo-c" src="./assets/logo.png" width="80%" height="80%">
        <div class="logo">
            <h1>LINESTO<span>.</span></h1>
        </div>
        <div class="nav__links">
            <a href="main.php" class="active nav__link">Home</a>
            <a href="#services" class="nav__link">Services</a>
            <a href="#about" class="nav__link">About</a>
            <a href="#contact" class="nav__link">Contact Us</a>
            <div class="dropdown">
            <a class="dropbtn" href="profile.php"><span class="material-symbols-rounded">account_circle</span></a>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            
        </div>
    </div>
    <div id="home" class="section">
        <center><div class="account-details">
            <div><label>First Name  </label><input type="text" name="fname" required></div>
            <div><label>Last Name </label><input type="text" name="lname" required></div>
            <div><label>Area of Interest  </label><input type="text" name="interest" required></div>
            <div><label>Repeat password*</label><input type="txt" name="name" required></div>
        </div></center>  
    </div>
    
    <section class="about_section" id="about">
        <center>

        </center>
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
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.</p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>

    <script type="text/javascript">
        gsap.to(".filled-text, .outline-text", {
            scrollTrigger: {
                trigger: ".filled-text, .outline-text",
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            },
            x: 200
        })

        gsap.to(".scroll-image", {
            scrollTrigger: {
                trigger: ".scroll-image",
                start: "top bottom",
                end: "bottom top",
                scrub: 1,
            },
            x: -250,

        })
    </script>

    <!-- partial -->
    <script src="./js/script.js"></script>

</body>



