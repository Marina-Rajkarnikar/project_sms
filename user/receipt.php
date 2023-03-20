<?php
include('../admin/config.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link href="../main/styles.css" rel="stylesheet" type="text/css"/>
    
    <title>Receipt</title>
    <style>
        .logo{
            width: 10%;
            height: 10%;
        }
        .container{
            margin: 30px;
            padding: 8px;
        }
    </style>
</head>
<body>
<!-- NAVBAR -->
<header>
<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
		<li><a href="#home">Home</a></li>
		<li><a href="display.php">Vehicles</a></li>
		<li><a href="cart.php"><i class="fa-sharp fa-solid fa-car"></i><sup></sup></a></li>
		<li><a href="contact.php">Contact</a></li>
		
		
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
<div class="container bg-body-tertiary">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="../main/images/about.png" alt="logo" class="logo">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">RENT<strong>A</strong>RIDE</a>
        </li>
      </ul>    
    </div>
  </div>
</nav>
<h1 class="text-center py-4 text-success fs-4 fw-bold text-uppercase"><i class="fa-regular fa-circle-check fa-2x"></i>  Payment Successful! </h1>
<p class=" border-bottom text-center">Your payment has been processed! Details of transactions are included below</p>
<table class="table table-bordered border-dark mt-5">
    <thead class="bg-dark text-center text-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Vehicle Name</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Paid Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $user_id = get_user_id_fromsession();
         $username = $_SESSION['rentee_name'];
        $email = user_email();
        $cart_query = "Select booking_id,Name, Image, pickupdate, dropoffdate, 
                    DATEDIFF(dropoffdate,pickupdate)*price as Price
                        from `book_details`, `vehicles` 
                        where book_details.vehicle_id=vehicles.vehicle_id AND book_details.user_id=$user_id";
                        $result = mysqli_query($con, $cart_query);
                        while($row = mysqli_fetch_array($result)){
                            // $vehicle_id=$row['vehicle_id'];
                            $vehicle_title = $row['Name'];
                            $pickup = $row['pickupdate'];
                            $dropoff = $row['dropoffdate'];
                            $vehicle_price = $row['Price'];
                                echo "<tr class='text-center'>
                                <td>$username</td>
                                <td>$email</td>
                                <td>$vehicle_title</td>
                                <td>$pickup</td>
                                <td>$dropoff</td>
                                <td>Rs.$vehicle_price/-</td>
                                </tr>";
                        
                            ?>
                            
            <?php
                        }
                    
            
            ?>        

    </tbody>
    <div class="button-container">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">PRINT Receipt</button>
</table>
</div>
</div>
    </div>
</body>
</html>