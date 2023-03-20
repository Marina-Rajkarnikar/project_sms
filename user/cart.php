<?php

include('../admin/config.php');
include('../functions/common_function.php');

if (isset($_POST['delete'])) {
    $booking_id = $_POST['booking_id'];
    $delete = "DELETE from  book_details where booking_id = '$booking_id'";
    $result = mysqli_query($con, $delete);
    if ($result===TRUE) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
        echo "Not Updated!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Booking Details</title>
	<!-- Fontawesome Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<!-- custom css file link  -->
	<link rel="stylesheet" href="css/styless.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<!-- custom js file link  -->
    <style>
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
</head>
<body>
<header>
<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
    <li><a href="../user/userindex.php">Home</a></li>
            <!-- <li><a href="#">Booking History</a></li> -->
            <li><a href="display.php">Vehicles</a></li>
            <li><a href="../user/cart.php"><i class="fa-sharp fa-solid fa-car"></i><sup></sup></a></li>
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
                 <a href="../admin/logout.php" class="sign-in">Logout</a>       
        </div>
	</ul>
	
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
</header>

  <!-- Booking Details Table -->
	<div class="container" style="margin: 120px auto;">
        <div class="row">
            <form action="cart.php" method="POST">
            <table class="booked">
                <thead>
                    
                    <!-- displaying dynamic data -->
                    <?php

                        global $con;
                        $user_id = get_user_id_fromsession();
                    $cart_query = "Select booking_id,Name, Image, pickupdate, dropoffdate, 
                    DATEDIFF(dropoffdate,pickupdate)*price*0.0076 as vehicle_price
                        from `book_details`, `vehicles` 
                        where book_details.vehicle_id=vehicles.vehicle_id AND book_details.user_id=$user_id";
                        $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if (mysqli_num_rows($result) > 0){
                        echo"<tr>
                        <th>Vehicle Name</th>
                        <th>Vehicle Image</th>
                        <th>Pick Up Date</th>
                        <th>Drop Off Date</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>";
                        // echo "$result_count";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $vehicle_title = $row['Name'];
                            $vehicle_image1 = $row['Image'];
                            $pickupdate = $row['pickupdate'];
                            $dropoffdate = $row['dropoffdate'];
                            $renting_price = $row['vehicle_price'];
                       ?>
                    <tr>
                        <td><?php echo $vehicle_title?></td>
                        <td><img src="../admin/vehicle_images/<?php echo $vehicle_image1?>" alt="" class="cart_img"></td>
                        <td><?php echo $pickupdate?></td>
                        <td><?php echo $dropoffdate?></td>           
                        <td>$<?php echo $renting_price?>/-</td>
                        <!-- <td><button class="continue">Update</button></td> -->
                        <td>
                            <form action="cart.php">
                                <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']?>">
                                <button type="submit" name="delete" class="continue">Remove</button>
                            </form>
                        </td>

                    </tr>
                        <?php
                    }}else{
                        echo "<h2 style='text-align:center;'>Booking List Is Empty!</h2>";
                    }
                    ?>
                </tbody>
            </table>
<!-- subtotal -->

            </div>
            <form action="#" method="post">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_51MMijBHmrwinhnCe2WzXT0EvwvTN2L0CTuBmqn4oGPCBAA6ElxPHcw9JTvN4jxWpUCnRO1RUeWewSmP9pnmXYQuI00Zqv5ZyYL"
                data-amount=<?php echo $renting_price * 100?>
                data-name="RENTARIDE"
                data-description="Vehicle Rental System"
                data-image="../logo.png"
                data-currency="usd"
                data-email="marinarjkr13@gmail.com"
                data-locale="auto">
                </script>
                </form>
            
        </div>


		
	</div>
    </form>
</body>

</html>