<?php
ob_start();
require_once ("init.php");
require_once ("mysql.php");
require_once 'login/includes/db_connect.php';
require_once 'login/includes/functions.php';
require_once ("inc-func.php");

sec_session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <?php include "inc-head.php"; ?>
</head>
<body>

<div class="container">
    <?php include "inc-header.php"; ?>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="img/slider/slider-1.png" style="width:100%">
            <div class="text">Old Boat Ride</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="img/slider/slider-2.png" style="width:100%">
            <div class="text">Temple</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="img/slider/slider-3.png" style="width:100%">
            <div class="text">New Boat Ride</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="img/slider/slider-4.png" style="width:100%">
            <div class="text">Mangrooves</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>

    <div class="text-content">
        <div class="col-3">
            <h2 class="hd-1">About us</h2>
            <p>Welcome to Blue Horizon Boat Safaris, your gateway to adventure on the serene waters of the Maadu River in the picturesque Balapitiya area of Sri Lanka's Southern Province.</p>
        </div>
        <div class="col-3">
            <h2 class="hd-2">Service</h2>
            <p>Explore the Maadu River with Blue Horizon Boat Safaris. Choose from our safari packages: mangrove marvels, wildlife encounters, cultural expeditions, and sunset serenity. Book now for an unforgettable adventure!</p>
        </div>
        <div class="col-3">
            <h2 class="hd-3">About us</h2>
            <p>At Blue Horizon, we are more than just a boat safari service; we are stewards of unforgettable experiences, passionate about connecting you with the breathtaking beauty and rich biodiversity of the Maadu River ecosystem. Our mission is to provide unparalleled excursions that blend excitement, relaxation, and education, all while fostering a deep appreciation for the natural wonders that surround us.</p>
        </div>
    </div>

    <div class="text-content">
        <div class="col-1">
            <h2 class="hd-1">About us</h2>
            <p>Whether you're seeking a leisurely cruise through mangrove forests, a thrilling wildlife encounter spotting exotic birds and elusive reptiles, or a cultural exploration of the river's vibrant communities, our expert guides are dedicated to ensuring every moment of your journey is unforgettable.</p>
        </div>

    </div>

</div>


<?php include "inc-footer.php"; ?>

<?php include "inc-foot.php"; ?>

</body>
</html>