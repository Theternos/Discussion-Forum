<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WEBSITE NAME</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,1,0" />

</head>


<body>
<style>
        body{ background-color: #f2f4fe;
              max-height: 100vh; }
    </style>
    <!-- partial:index.partial.html -->
    <div class="navbar">
        <img class="logo-c" src="./assets/logo.png" width="80%" height="80%">
        <div class="logo">
            <h1>WEBSITE NAME</h1>
        </div>
        <div class="nav__links">
            <a href="#home" class="active nav__link">Home</a>
            <a href="#services" class="nav__link">Services</a>
            <a href="#about" class="nav__link">About</a>
            <a href="#contact" class="nav__link">Contact Us</a>
            <a href="login.php" class="nav__link">Login</a>
        </div>
    </div>
    <div id="home" class="section">
        <h1 class="design">T</h1>
        <h1 class="slogan">he individual investor should act consistently <br>as an investor and not as a speculator<span>.</span></h1>
        <h1 class="slogan-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</h1>
        <a href="#"><button class="button">Get Started</button></a>
        <div class="landingimage"><img src="./assets/investor.jpg" width="100%"></div>
    </div>
    
    <section class="about_section" id="about">
        <center>
            <div class="about" >
                <h1>About</h1>
                <p>
                <span class="material-symbols-outlined">radio_button_checked</span>
                The platform should be able to handle two types of users, i.e.entrepreneurs and investors.</p><br>
                <p><span class="material-symbols-outlined">radio_button_checked</span>
                Try to include all the relevant details of both types of users, i.e., the investor and the startup founder. Also, confirm whether the Government of India verifies the startup.</p><br>
                <p><span class="material-symbols-outlined">radio_button_checked</span>
                The platform must provide a forum where investors and startup founders can interact and negotiate.</p><br>
                <p><span class="material-symbols-outlined">radio_button_checked</span>
                Provide a functionality where investors can search for startups in various fields and choose wisely. The search results must include all the necessary details about the startups.</p><br>
                <p><span class="material-symbols-outlined">radio_button_checked</span>
                Similarly, entrepreneurs should be able to search for potential investors</p>
            </div>
        </center>
    </section>
    <footer></footer>




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