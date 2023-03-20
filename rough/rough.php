<?php

include('../admin/config.php');
include('../functions/common_function.php');
if (isset($_POST['submit'])) {
  $pickupdate = $_POST['pickup'];
  $dropoffdate = $_POST['dropoff'];
  $vehicle_id = $_GET['add_to_cart'];
  $user_id=get_user_id_fromsession();
      
      $insert_query = "insert into `book_details` (vehicle_id,user_id,pickupdate,dropoffdate,status) values ($vehicle_id,'$user_id','$pickupdate','$dropoffdate','pending')";
      $result_query = mysqli_query($con, $insert_query);
      if ($result_query) {

        echo "<script>alert('Vehicle Is Added to Book')</script>";
        echo "<script>window.open('rough.php', '_self')</script>";

      } else {
        echo "<script>alert('Error!')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vehicle Display</title>
	<!-- Fontawesome Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  
	<!-- custom css file link  -->
	<link rel="stylesheet" href="styling.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<!-- custom js file link  -->
	<script src="script.js" defer></script>

	<style>
		nav{
   background: #eeeff1;
   display: flex;
   flex-wrap: wrap;
   align-items: center;
   justify-content: space-between;
   height: 70px;
   padding: 0 100px;
 }
 nav .logorr{
   color: #000;
   font-size: 30px;
   font-weight: 600;
   letter-spacing: -1px;
 }
 nav .nav-items{
   display: flex;
   flex: 1;
   padding: 0 0 0 40px;
 }
 nav .nav-items li{
   list-style: none;
   padding: 0 15px;
 }
 nav .nav-items li a{
   color: #000;
   font-size: 18px;
   font-weight: 500;
   text-decoration: none;
 }
 nav .nav-items li a:hover{
   color: #ff3d00;
 }
 nav form{
   display: flex;
   height: 40px;
   padding: 2px;
   background: #f1f1f1;
   min-width: 18%!important;
   border-radius: 2px;
   border: 1px solid rgba(155,155,155,0.2);
 }
 nav form .search-data{
   width: 100%;
   height: 100%;
   padding: 0 10px;
   color: #000;
   font-size: 17px;
   border: none;
   font-weight: 500;
   background: none;
 }
 nav form button{
   padding: 0 15px;
   color: #fff;
   font-size: 17px;
   background: #ff3d00;
   border: none;
   border-radius: 2px;
   cursor: pointer;
 }
 nav form button:hover{
   background: #e63600;
 }
 nav .menu-iconnn,
 nav .cancel-icon,
 nav .search-icon{
   width: 40px;
   text-align: center;
   margin: 0 50px;
   font-size: 18px;
   color: #fff;
   cursor: pointer;
   display: none;
 }
 nav .menu-iconnn span,
 nav .cancel-icon,
 nav .search-icon{
   display: none;
 }
 .header-btn{
	padding: 10px 20px;
	color: #444;
	font-weight: 500;
	text-decoration: none;
}
.header-btn{
	background: #4745a0;
	color: #FFF;
	border-radius: 0.5rem;
}
.header-btn:hover{
	background: #fe5b3d;
}
.containerss{
   max-width: 1200px;
   margin: 0 auto;
   padding: 3rem 2rem;
}

	</style>



</head>
<nav>
         <div class="menu-iconnn">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logorr">
            Welcome <?php echo $_SESSION['rentee_name'] ?>
         </div>
         <div class="nav-items">
            <li><a href="../user/userindex.php">Home</a></li>
            <li><a href="rough.php">Vehicles</a></li>
            <li><a href="../user/cart.php"><i class="fa-sharp fa-solid fa-car addtocart"></i><sup><?php cart_item(); ?></sup></a></li> 
            
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="#">
            <input type="search" class="search-data" placeholder="Search Vehicles...." required>
            <button type="submit" class="fas fa-search"></button>
         </form>
         <div>
         <li><a href="../admin/logout.php"><button class="header-btn">Log Out</button></a></li></div>
      </nav>
      
<body>
  
  
	<div class="containerss">


		<div class="products-container">
			<?php
			$select_query = "Select * from `vehicles`  LIMIT 0,9";
			$result_query = mysqli_query($con, $select_query);
            $count = 1;
			while ($row = mysqli_fetch_assoc($result_query)) {
				$vehicle_id = $row['vehicle_id'];
				$vehicle_title = $row['Name'];
				$vehicle_description = $row['Description'];
				$vehicle_image1 = $row['Image'];
				$vehicle_price = $row['Price'];
				$brand_id = $row['Brand'];
				$vehicle_price = $row['Price'];
				echo "<div class='product' data-name='p-$count'>
                    <img src='../admin/uploadimages/$vehicle_image1' alt='$vehicle_title'>
                        <h3>$vehicle_title</h3>
                    <div class='price'>Rs.$vehicle_price Per Day/-</div>
                  </div>
                  ";
	            $count++;
			}
			?>
		</div>
		<div class="products-preview">
		<?php
			$select_query = "Select * from `vehicles`";
			$result_query = mysqli_query($con, $select_query);
            $count = 1;
			while ($row = mysqli_fetch_assoc($result_query)) {
				$vehicle_id = $row['vehicle_id'];
				$vehicle_title = $row['Name'];
				$vehicle_description = $row['Description'];
				$vehicle_image1 = $row['Image'];
				$vehicle_price = $row['Price'];
				$brand_id = $row['Brand'];
				$vehicle_price = $row['Price'];
				echo "   <div class='preview' data-target='p-$count'>
				<i class='fas fa-times'></i>
				<img src='../admin/uploadimages/$vehicle_image1' alt='$vehicle_title'>
				<h3>$vehicle_title</h3>
				
				<p>$vehicle_description</p>
				<div class='price'>Rs.$vehicle_price Per Day/-</div>
        <form method='POST' action='rough.php?add_to_cart=$vehicle_id'>
        <div class= detailsform>
        <label for='pickup'>PickUp Date:</label>
        <input type='date' id='pickup' min='today' name='pickup'>
        <label for='dropoff'>Drop Off Date:</label>
        <input type='date' id='dropoff' min='today' name='dropoff'>
        </div>
        <input type='submit' class='buttons' name='submit' value='Rent Now'>
				</form>
			 </div>
			 ";
	            $count++;
			}
			?>
		</div>
</body>

</html>