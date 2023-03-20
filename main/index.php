<!DOCTYPE html>
<html>
<head>
	<title>RentARide</title>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo">RENT<strong> A </strong>RIDE</div>
	<ul class="links">
		<li><a href="#home">Home</a></li>
		<li><a href="#ride">Ride</a></li>
		<li><a href="#services">Services</a></li>
		<li><a href="#about">About</a></li>
		<li><a href="#specials">Our Specials</a></li>
		<li><a href="../user/user_registration.php" class="sign-up">Sign Up</a></li>
		<div class="header-btn">
                 <a href="../user/user_login.php" class="sign-in">Sign In</a>       
        </div>
	</ul>
	
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
</header>
<!-- Home Section -->
    <section class="home" id="home">
        <div class="text">
            <h1><span>Looking</span> to <br>rent a ride</h1>
            <p>Looking to rent a ride? No worries, We got You!</p><br>
            <div class="header-btn">
                <a href="#about" class="sign-in">Why Choose Us?</a><br><br><br><br>
                <marquee><h3>Serving since 2022 with customer satisfaction as the first priority!</h3></marquee>
            </div>   
        </div>        
    </section>
    <!-- Ride Section -->
    <section class="ride" id="ride">
        <div class="heading">
            <span>How It Works</span>
            <h1>Rent With 3 Easy Steps </h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>User Rents the Vehicle</h2>
                <p>The user provides details on: pick up and drop off dates and time, vehicle type and model, travel area, and billing information.</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Booking Gets Confirmed</h2>
                <p>Rent-A-Ride runs a final confirmation and sends the suitable vehicle.</p>
            </div>

            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Vehicle Arrives at the Pick-up Point</h2>
                <p>Rent-A-Ride vehicle reaches the pick-up point, then the customer can embark his/her journey.</p>
            </div>
        </div>
    </section>
    <!-- Services -->
    <section class="services" id="services">
        <div class="heading">
            <span>Best Services</span>
            <h1>Explore Out Top Deals <br> From Top Rated Dealers</h1>
        </div>
        <div class="services-container">
            <div class="box">
            <div class="box-img">
                <img src="images/bajajavenger.jpg">
            </div>
            <p>Bike</p>
            <h3>Bajaj Avenger 160 Street</h3>
            <h2>Rs.1,000 <span>/day</span></h2>
            <a href="../user/user_login.php" class="btn">Rent Now</a>
            </div>

            <div class="box">
                <div class="box-img">
                    <img src="images/bike.jpg">
                </div>
                <p>Bike</p>
                <h3>2018 Honda Civic</h3>
                <h2>Rs.1,500 <span>/day</span></h2>
                <a href="../user/user_login.php" class="btn">Rent Now</a>
                </div>

                <div class="box">
                    <div class="box-img">
                        <img src="images/car16.png">
                    </div>
                    <p>Car</p>
                    <h3>Ford Freestyle 1.2L Titanium</h3>
                    <h2>Rs.2,500 <span>/day</span></h2>
                    
                    <a href="../user/user_login.php" class="btn">Rent Now</a>
                </div>

                <div class="box">
                    <div class="box-img">
                        <img src="images/mercedesbenzglc.png">
                    </div>
                    <p>Car</p>
                    <h3>2018 Honda Civic</h3>
                    <h2>Rs.3,000 <span>/day</span></h2>
                    
                    <a href="../user/user_login.php" class="btn">Rent Now</a>
                </div>

                
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="heading">
            <span>About Us</span>
            <h1>Your Travel Companion</h1>
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="images/about.png">
            </div>
            <div class="about-text">
                <span>About Us</span>
                <p>Rent-A-Ride is a prominent name in vehicle rentals in Nepal, equipped with safety-assured vehicles and strong online service support. We serve vehicle rental services for the general public with our wide range of vehicles -budget cars, luxury cars, Electric cars, SUVs, and others- for their professional, personal or religious purpose.</p> 
                <a href="#" class="btn">Learn More</a>  
            </div>
        </div>   
    </section>
   <!--   Our Specials Section -->
   <section class="specials" id="specials">
    <div class="heading">
        <span>Look at our Specials!</span>
        <h1>Our Specials</h1>
    </div>
    
<div class="slider owl-carousel">
        <div class="card">
            <div class="img">
                <img src="images/weddingcar.jpg" alt="">
            </div>
        <div class="content">
    <div class="title">
        Wedding Cars
    </div>
<p>
  Since weddings are special events for families and the special couple, everything has to be perfect, including the wedding car. A Memory for a lifetime!</p>
        <div class="btn">
            <a href=""><button>Book Now!</button></a>
        </div>
        </div>
    </div>
<div class="card">
<div class="img">
<img src="images/airport.jpg" alt="">
</div>
<div class="content">
<div class="title">
  Airport Pick up Cars
</div>
<p>You must have once felt the desire to get escorted and received in the airport in a luxury car. If you are this person, Rent-A-Ride is here! One thing off your Bucketlist!
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
  
</div>
</div>
</div>
<div class="card">
<div class="img">
<img src="images/tourbus.jpg" alt="">
</div>
<div class="content">
<div class="title">
  Domestic Tour Vehicles
</div>

<p>Nepal is a beautiful country which attracts both local and international tourists. Both local and international tourists might be looking for cost-effective car rentals in Nepal. 
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
</div>
</div>
</div>
<div class="card">
<div class="img">
<img src="images/vip.jpg" alt="">
</div>
<div class="content">
<div class="title">
  VIP Delegate Cars
</div>

<p>Many VIP delegates and diplomats visit Nepal for business meetings and proposals and look for luxury cars. Rent-A-Ride ensures to employ high-in-class luxurious cars.
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
  
</div>
</div>
</div>
<div class="card">
<div class="img">
<img src="images/jeep.jpg" alt="">
</div>
<div class="content">
<div class="title">
  Weekend Trip Vehicles
</div>

<p>
  Planning on a weekend trip with your friends? family?  to get away from the chaos? Don't you worry, Rent-A-Ride offers you variety of options! So, pack your bags and go!
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
  
</div>
</div>
</div>
<div class="card">
<div class="img">
<img src="images/bike.jpg" alt="">
</div>
<div class="content">
<div class="title">
  Bike Road Trip
</div>

<p>Hit the open road with your friend or your other half with our finest collection of bikes! Fill up the tank, pack your bags, and go! A memory for a lifetime!
  
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
  
</div>
</div>
</div>
<div class="card">
<div class="img">
<img src="images/roadtrip.jpg" alt="">
</div>
<div class="content">
<div class="title">
  Roadtrip Vehicles
</div>

<p>Planning on a road trip with your friends? Don't worry we got you! Hit the open road with your friends, family for any trip with our wide range of vehicles.
 
</p>
<div class="btn">
  <a href=""><button>Book Now!</button></a>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function toggleMenu(){
var menuToggle = document.querySelector('.menuToggle')
var navigation = document.querySelector('.navigation')
menuToggle.classList.toggle('active')
navigation.classList.toggle('active')
}
</script>
<script>
$(".slider").owlCarousel({
loop: true,
autoplay: true,
autoplayTimeout: 2000, //2000ms = 2s;
autoplayHoverPause: true,
});
</script>
<div class="copyright">
    <p>&#169; Shristi Kharel All Rights Reserved</p>
</div>  
    <script src="main.js"></script>
</body>
</html>


