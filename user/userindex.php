<?php
include ('../admin/config.php');
include ('../functions/common_function.php');


if(!isset($_SESSION['rentee_name'])){
   header('location:user_login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>RentARide</title>
	<link href="../main/styles.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Fontawesome Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- custom js file link  -->
<script src="script.js" defer></script>
</head>
<style>
form.example input[type=text] {
	padding: 10px;
	font-size: 17px;
	border: 1px solid grey;
	float: left;
	width: 60%;
	background: #f1f1f1;
	margin-right: 2px;
  }
  
  form.example button {
	float: left;
	width: 20%;
	padding: 10px;
	background: #2196F3;
	color: white;
	font-size: 17px;
	border: 1px solid grey;
	border-left: none;
	cursor: pointer;
  }
  
  form.example button:hover {
	background: #0b7dda;
  }
.btn{
	padding: 10px;
	background-color: #4745a0;
	color: #fff;
	border-radius: 0.5rem;
}
.links li:hover{
	background: aliceblue;
}
.dropbtn {
  background-color: #4745a0;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 0.5rem;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #fe5b3d;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>

<body>
	<header>
<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
		<li><a href="#home">Home</a></li>
		<li><a href="display.php">Vehicles</a></li>
		<li><a href="cart.php"><i class="fa-sharp fa-solid fa-car"></i><sup></sup></a></li>
		<li><a href="contact.php">Contact</a></li>
		<!-- <div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-user"></i> Profile</button>
				<div id="myDropdown" class="dropdown-content">
				 
					<a href="#contact"><i class="fa-solid fa-bookmark"></i> My Bookings</a>
					<a href="#about"><i class="fa-solid fa-trash"></i> Delete Account</a>
				</div>
				</div>
				<script>
				function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}
				window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
					}
				}
				}
				</script> -->
		
		<div class="header-btn">
                 <a href="../admin/logout.php" class="sign-in">Log Out</a>       
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
            <h1><span>Explore</span> our <br>top deals!</h1>
            <p>Looking to rent a ride? No worries, We got You!</p><br>
            <div class="header-btn">
            <form class="example" style="max-width:300px" method="get" action="search.php">
            <input type="text" placeholder="Search" aria-label="Search" name="search_data">
			<input type="submit" value="Search" class="btn"><br><br><br>

            <!-- <button name="upload"><i class="fa fa-search" name="search_data_vehicle"></i></button> -->
            </form>
            <marquee><h3>Serving since 2022 with customer satisfaction as the first priority!</h3></marquee>
            </div>   
        </div>        
    </section>

    </body>
</html>
