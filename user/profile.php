<?php
include ('../admin/config.php');
include ('../functions/common_function.php');

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
.wrapper{
    margin-top: 100px;
    /* display: flex;
    position: relative; */
}
/* .wrapper .sidebar{
    position: fixed;
    width: 250px;
    height: 100%;
    background-color: #eeeff1;
} */
.profile_img{
    height: 200px;
    width: 250px;
    object-fit: contain;
}
.container h4{
    text-align: center;
    padding: 8px;
}
.card-img-top {
width: 100%;
height: 30vh;
object-fit: contain;
}

	</style>
	<body>
		<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
		<li><a href="userindex.php">Home</a></li>
		<li><a href="#">Vehicles</a></li>
		<li><a href="cart.php"><i class="fa-sharp fa-solid fa-car"></i><sup></sup></a></li>
		<li><a href="contact.php">Contact</a></li>
		<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-user"></i> Profile</button>
				<div id="myDropdown" class="dropdown-content">
				<a href="profile.php"><i class="fa-solid fa-user"></i> My Account</a>
					<a href="#about"><i class="fa-solid fa-user-pen"></i> Edit Account</a>
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
				</script>
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
<!-- Side nav bar -->
<div class="container">
	<div class="row">
        <h4>My Account</h4>
        <ul>
            <?php
            $username = $_SESSION['rentee_name'];
            $user_image="Select * from user_table where username='$username'";
            $user_image=mysqli_query($con, $user_image);
            $row_image = mysqli_fetch_array($user_image);
            $user_image = $row_image['user_image'];
            echo "<div class='col-md-2'>
			<div class=card style='width: 18rem; height:100%'>
			<div style='width:100%; height:10rem'>
				<img src='./userimages/$user_image' class='card-img-top' alt='user_image' >
			</div>
	  <div class='card-body mt-5'>
		<h5 class='card-title'>Hello</h5>
		<p class='card-text'>Hello</p>
		<a href='#' class='btn btn-primary'>View More</a>
	  </div>
	</div>
			</div>";
			
            
            
            ?>
			</div>
			
            <li><a href="#"><i class="fa-solid fa-user"></i>Hello</a></li>
        </ul>
</div>
    </body>
    </html>
	<!-- <li><img src='./userimages/$user_image' class='profile_img'></li> -->