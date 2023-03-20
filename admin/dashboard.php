<?php 

include("../functions/common_function.php")

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
            .center {
               align-items: center;
            }
        </style>
    <title>Document</title>
</head>
<body>
    
<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-car fa-2x"></i> Welcome <?php echo $_SESSION['admin_name'] ?></h3>
<div class="row">
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fa fa-users text-danger align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5">3</p>
  </div>
  </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-danger text-light text-center fw-bold">Customers</li>
  </ul>
</div>
    </div>
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fa fa-money text-warning fa-4x canter"></i></h5>
    <p class="card-text fs-5">3</p>
          
  </div>
  </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-warning text-light text-center fw-bold">Pending Bookings</li>
  </ul>
</div>
    </div>
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fa fa-check-circle text-success align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5">3</p>
          
  </div>
    </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-success text-light text-center fw-bold">Completed Bookings</li>
  </ul>
</div>
    </div>
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fa fa-truck text-dark align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5">10</p>
  </div>
          </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-dark text-light text-center fw-bold">Vehicles</li>
  </ul>
</div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fas fa-bus-alt text-dark align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5">2</p>
  </div>
          </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-dark text-light text-center fw-bold">Categories</li>
  </ul>
</div>
    </div>
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fas fa-shuttle-van text-danger align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5">4</p>
  </div>
          </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-danger text-light text-center fw-bold">Brands</li>
  </ul>
</div>
    </div>
    <div class="col-md-3">
    <div class="card" style="width: 18rem;">
    <center>
  <div class="card-body bg-light">
    <h5 class="card-title"><i class="fas fa-calendar-alt text-success align-items-center fa-4x"></i></h5>
    <p class="card-text fs-5"><?php echo "Today is " . date("Y/m/d") . "<br>";?></p>
  </div>
          </center>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-success text-light text-center fw-bold">Date</li>
  </ul>
</div>
    </div>
    
</div>
</body>
</html>