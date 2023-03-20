<?php
include ('../admin/config.php');
include ('../functions/common_function.php');
if (isset($_POST['submit'])) {
	$pickupdate = $_POST['pickup'];
	$dropoffdate = $_POST['dropoff'];
	$vehicle_id = $_GET['add_to_cart'];
	$user_id=get_user_id_fromsession();
	$email = user_email();
		
		$insert_query = "insert into `book_details` (vehicle_id,user_id,email,pickupdate,dropoffdate,status) values ($vehicle_id,'$user_id','$email','$pickupdate','$dropoffdate','pending')";
		$result_query = mysqli_query($con, $insert_query);
		if ($result_query) {
  
		  echo "<script>alert('Vehicle Is Added to Book')</script>";
		  echo "<script>window.open('cart.php', '_self')</script>";
  
		} else {
		  echo "<script>alert('Error!')</script>";
		}
	  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>RentARide</title>
	<link href="../main/styles.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<!-- Fontawesome Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- custom js file link  -->
<script src="script.js" defer></script>
</head>
<style>
	body{
		background-color: #eeeff1;
	}
	.container{
		margin-top: 150px;
		
	}
	.img{
		height: 150px;
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
		<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
		<li><a href="userindex.php">Home</a></li>
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
<div class="container">
	<?php
view_details();
?>
</div>
</body>

</html>