<?php

include('../admin/config.php');

// Get User ID Function  for RENTEE
function get_user_id_fromsession()
{
  global $con;
  $select_query = "Select * from `user_table` where  username = '{$_SESSION['rentee_name']}'";
  $result_query = mysqli_query($con, $select_query);
  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_assoc($result_query)) {
      // to output mysql data in HTML table format
      $user_id = $row['id'];
    }
  }
  return $user_id;
}

// Get User ID Function  for ADMIN
function get_user_id_admin()
{
  global $con;
  $select_query = "Select * from `user_table` where  username = '{$_SESSION['admin_name']}'";
  $result_query = mysqli_query($con, $select_query);
  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_assoc($result_query)) {
      // to output mysql data in HTML table format
      $user_id = $row['id'];
    }
  }
  return $user_id;
}

// Get User ID Function  for RENTER
function get_user_id_renter()
{
  global $con;
  $select_query = "Select * from `user_table` where  username = '{$_SESSION['renter_name']}'";
  $result_query = mysqli_query($con, $select_query);
  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_assoc($result_query)) {
      // to output mysql data in HTML table format
      $user_id = $row['id'];
    }
  }
  return $user_id;
}


function user_email()
{
  global $con;
  $select_query = "Select * from `user_table` where  username = '{$_SESSION['rentee_name']}'";
  $result_query = mysqli_query($con, $select_query);
  if (mysqli_num_rows($result_query) > 0) {
    while ($row = mysqli_fetch_assoc($result_query)) {
      // to output mysql data in HTML table format
      $user_id = $row['email'];
    }
  }
  return $user_id;
}

// Book Function
// function book()
// {
//   if (isset($_GET['add_to_cart'])) {
//     global $con;
// $get_ip_add = getIPAddress();
// $get_product_id = $_GET['add_to_cart'];
// $user_id=get_user_id_fromsession();
// echo "<script>alert('$user_id')</script>";
// echo "<script>alert('$get_product_id')</script>";
//   $insert_query = "insert into `book_details` (vehicle_id,user_id,pickupdate,dropoffdate) values ($get_product_id,'$user_id',0,0)";
//   $result_query = mysqli_query($con, $insert_query);
//   if ($result_query) {

//     echo "<script>alert('Vehicle is added to book')</script>";
//     echo "<script>window.open('rough.php', '_self')</script>";

//   } else {
//     echo "<script>alert('Error!')</script>";
//   }
// }



// }else{
//   $insert_query = "insert into `book_details` (vehicle_id,user_id,pickupdate,dropoffdate) values ($get_product_id,'$rentee_name',0,0)";
//   $result_query=mysqli_query($con,$insert_query);
//   echo "<script>alert('Vehicle is added to book')</script>";
//   echo "<script>window.open('rough.php', '_self')</script>";
// }
//}



// function to get vehicle number
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $select_query = "Select COUNT(vehicle_id)  from `book_details` GROUP BY vehicle_id";
    $result_query = mysqli_query($con, $select_query);
    $count_cart_items  = mysqli_num_rows($result_query);
  } else {
    global $con;
    $select_query = "Select COUNT(vehicle_id)  from `book_details` GROUP BY vehicle_id";
    $result_query = mysqli_query($con, $select_query);

    $count_cart_items  = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

// NUMBER OF VEHICLES
// function no_of_vehicles(){
//   global $con;
//   $count_query = "SELECT COUNT(vehicle_id) FROM `vehicles`";
//   $result_query=mysqli_query($con,$count_query);
//     $count_vehicles  = mysqli_num_rows( $result_query );
//   echo $count_vehicles;
// }

// NUMBER OF CATEGORIES

// function no_of_categories(){
//   global $con; 
//   $count_query = "SELECT COUNT(*) FROM categories";
//   $result_query_cat=mysqli_query($con,$count_query);
//   $count_category= mysqli_num_rows($result_query_cat); 
//   }if($result_query_cat===TRUE){
//   echo "$count_category";
//   }else{
//   "No Count!";
//   }

// REFRESH PAGE
// function reload(){
//   $page = $_SERVER['PHP_SELF'];
// print "<a href=\"$page\"></a>";
// }


// VIEW MORE
function view_details()
{
  global $con;
  if (isset($_GET['vehicle_id'])) {
    $vehicle_id = $_GET['vehicle_id'];
    $select_query = "Select * from `vehicles` where vehicle_id=$vehicle_id";
    $result_query = mysqli_query($con, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
      $vehicle_id = $row['vehicle_id'];
      $vehicle_title = $row['Name'];
      $vehicle_description = $row['Description'];
      $vehicle_image1 = $row['Image'];
      $vehicle_image2 = $row['Image2'];
      $photo3 = $row['Image3'];
      $vehicle_image4 = $row['Image4'];
      $vehicle_price = $row['Price'];
      $brand_id = $row['Brand'];
      $vehicle_price = $row['Price'];
      echo "<div class='row' style='height:60vh'>
    <div class='col-md-3'>
		<div class=card style='width: 18rem; height:100%'>
        <div style='width:100%; '>
        <img src='../admin/vehicle_images/$vehicle_image1' class='card-img-top' alt='$vehicle_title' >
      </div>
  <div class='card-body'>
    <h5 class='card-title'>$vehicle_title</h5>
    <p class='card-text'>$vehicle_description</p>
    <h6 class='card-title text-danger fw-bold'>Price: Rs.$vehicle_price Per Day/-</h6>
    <a href='display.php' class='btn btn-primary mt-3'>Go to Home</a>
  </div>
</div>
		</div>
    <div class='col-md-3'>
    <div class='card' style='width: 18rem; height:100%'>
    <div>
  <img src='../admin/vehicle_images/$vehicle_image2' class='card-img-top' alt=''>
  </div>
  <div class='card-body' style='
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
'>
    <h5 class='card-title'></h5>
    <p class='card-text'><i class='fa-solid fa-gas-pump'></i> Electronic Fuel Injection </p>
    <p class='card-text'><i class='fa-solid fa-triangle-exclamation'></i> Empty Fuel Warning </p>
    <p class='card-text'><i class='fa-solid fa-key'></i> Engine Immobilizer </p>
    <p class='card-text'><i class='fa-solid fa-car-on'></i> Anti-Theft Alarm </p>
    <p class='card-text'><i class='fa-solid fa-hourglass-start'></i> Start-Stop Technology </p>
    </div>
</div>
</div>
<div class=col-md-3>
<div class=card style='width: 18rem; height:100%'>
<div>
<img src='../admin/vehicle_images/$vehicle_image4' class='card-img-top' alt='$vehicle_title'>
</div>
  <div class='card-body'>
    <h5 class='card-title text-center'>Book Now!</h5>
    <form method='POST' action='viewmore.php?add_to_cart=$vehicle_id'>
        <div class= detailsform>
        <label for='pickup' class='mt-2'>PickUp Date:</label>
        <input type='date' id='pickup' min=" . date('Y-m-d') . " name='pickup' class='form-control' required='required'>
        <label for='dropoff' class='mt-2'>Drop Off Date:</label>
        <input type='date' id='dropoff' min=" . date('Y-m-d') . "  name='dropoff' class='form-control' required='required'>
        </div>
        <input type='submit' class='btn btn-primary mt-3' name='submit' value='Rent Now'>
				</form>
  </div>
</div>
</div>
<div class='col-md-3'>
		<div class=card style='width: 18rem; height:100%'>
        <div style='width:100%; '>
        <img src='../admin/vehicle_images/$photo3' class='card-img-top' alt='$vehicle_title' >
      </div>
  <div class='card-body'>
    <h5 class='card-title'>$vehicle_title</h5><br>
    <marquee><h5 class='fw-bold fst-italic'>Book Now!</h5></marquee>
    <h5 class='card-title text-success'><i class='fa-solid fa-square-phone'></i> For more information:</h5>
    <h6 class='card-title'><i class='fa-solid fa-location-dot'></i> Jawalakhel, Lalitpur</h6>
    <h6 class='card-title'><i class='fa-solid fa-envelope'></i> marinarjkr13@gmail.com</h6>
    <h6 class='card-title'><i class='fa-solid fa-phone'></i> 9823544647</h6>
    
    <a href='display.php' class='btn btn-primary mt-3'>Go to Home</a>
  </div>
</div>

</div>";
    }
  }
}

// SEARCH VEHICLES
function search_vehicle($con)
{
  if (isset($_GET['search_data'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from `vehicles` where keywords like '%" . $search_data_value . "%'";
    $result_query = mysqli_query($con, $search_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
      $vehicle_id = $row['vehicle_id'];
      $vehicle_title = $row['Name'];
      $vehicle_description = $row['Description'];
      $vehicle_image1 = $row['Image'];
      $vehicle_price = $row['Price'];
      $brand_id = $row['Brand'];
      $vehicle_price = $row['Price'];
      echo "
      <div class='col-md-3'>
      <div class=card style='width: 18rem; height:100%'>
      <div style='width:100%; height:10rem'>
        <img src='../admin/vehicle_images/$vehicle_image1' class='card-img-top' alt='$vehicle_title' >
      </div>
    <div class='card-body mt-5'>
      <h5 class='card-title'>$vehicle_title</h5>
      <p class='card-text'>$vehicle_description</p>
      <a href='viewmore.php?vehicle_id=$vehicle_id' class='btn btn-primary'>View More</a>
    </div>
  </div>
      </div>
		";
    }
  }
}
