<?php
include ('config.php');
include ('../functions/common_function.php');
// session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../design.css" rel="stylesheet" type="text/css"/>
    <title>User Page</title>
    <!-- Bootstrap CSS Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Fontawesome Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
<body>
  <!-- navbar -->
<div class="container-fluid p-0">
    <!-- First Child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/about.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Vehicles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-car"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price</a>
        </li>
        
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_vehicle">
      </form>
    </div>
  </div>
</nav>
<!-- Second Child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav mg-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome <span><?php echo $_SESSION['user_name'] ?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>
    </ul>
</nav>

<!-- Third Child -->
<div class="bg-light">
    <h3 class="text-center">Explore Our Top Deals</h3>
    <p class="text-center">Looking to rent a ride? No worries, We got You!</p>
</div>

<!--Fourth Child --> 
<div class="row px-1">
  <div class="col-md-10">
        <!-- Vehicles -->
        <div class="row">
          <!-- Fetching Products -->
  <?php
    if(isset($_GET['search_data_vehicle'])){
      $search_data_value=$_GET['search_data'];
      $search_query="Select * from `vehicles` where vehicle_keywords like '%$search_data_value%'";
      $result_query=mysqli_query($con,$search_query);
      $no_of_rows=mysqli_num_rows($result_query);
      if($no_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Results Match. No vehicles found on this category!</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $vehicle_id=$row['vehicle_id'];
        $vehicle_title=$row['vehicle_title'];
        $vehicle_description=$row['vehicle_description'];
        $vehicle_image1=$row['vehicle_image1'];
        $vehicle_price=$row['vehicle_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='../admin/vehicle_images/$vehicle_image1' class='card-img-top' alt='$vehicle_title'>
    <div class='card-body'>
      <h5 class='card-title'>$vehicle_title</h5>
      <h6 class='card-text'>$vehicle_price</h6>
      <p class='card-text'>$vehicle_description</p>
      <a href='#' class='btn btn-info'>Rent Now</a>
      <a href='#' class='btn btn-secondary'>View More</a>
    </div>
    </div>
  </div>";
      }
  }
  ?>
            
<!-- Row End-->
  </div>
<!-- Column End -->
</div>
    <div class="col-md-2 bg-secondary p-0">
        <!-- Brands to be Displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
            </li>
            <?php
            $select_query="Select * from `brands`";
            $result_select=mysqli_query($con,$select_query);
            // $brand_exist=FALSE;
          if(mysqli_num_rows($result_select) > 0)
          {
            //  echo '<table> <tr>  <th> Brand Title </th>  </tr>';
             while($row = mysqli_fetch_assoc($result_select)){
               // to output mysql data in HTML table format
                echo '<tr> <td>' .$row["brand_title"] . '</td> <br/></tr>';
                echo '<table>';
          }
        }
        else{
          echo "You donot have any brand!";
        }
            ?>
            
           
        </ul>
        <!-- Categories to be Displayed -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php
            $select_query="Select * from `categories`";
            $result_select=mysqli_query($con,$select_query);
            // $brand_exist=FALSE;
          if(mysqli_num_rows($result_select) > 0)
          {
            //  echo '<table> <tr>  <th> Brand Title </th>  </tr>';
             while($row = mysqli_fetch_assoc($result_select)){
               // to output mysql data in HTML table format
                echo '<tr >  <td>' . $row["category_title"] . '</td> <br/></tr>';
             echo '</table>';
          }
        }
        else{
          echo "You donot have any category!";
        }

        ?>
        </ul>

        
    </div>
</div>

<!-- Last Child -->
<div class="bg-info p-3 text-center">
    <p>&#169; Shristi Kharel All Rights Reserved</p>
</div>
</div>


<!-- Bootstrap JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>