<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design.css">
  <title>Categories</title>
  <style>
    .img{
      height: 70px;
      width: 100px;
      object-fit: contain;
    }
  </style>
</head>
<?php
if (isset($_POST['upload'])) {
  $NAME = $_POST['name'];
 
  // print_r($_FILES['image']);
  
  //insert data
  mysqli_query($con, "INSERT INTO `categories`(`Name`) VALUES ('$NAME')");
}
?>
<body>
<h2 class="text-center py-4  text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user fa-2x"></i> Hello <?php echo $_SESSION['admin_name'] ?></h2>
<div class="row">
  <div class="col-md-3">
  <h2 class="text-center py-4  text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-arrow-circle-down fa-2x"></i> Insert Category</h2>
  <div class="main_body">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="input-group w-100 mb-2">
  <span class="input-group-text bg-dark text-light" id="basic-addon1"><i class="fas fa-receipt"></i></span>
  <input type="text" class="form-control" name="name" placeholder="Insert Category" aria-label="categories" aria-describedby="basic-addon1" required="required">
</div>
     
      <button name="upload" class="bg-dark text-light border-0 p-2 my-3">Upload</button>
      </form>    
    </div>


</div>
  <div class="col-md-9">
  <h2 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-shuttle-van fa-2x"></i>  View Categories</h2>
  <table class="table text-center">
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Category Name</th>
      <!-- <th scope="col">Category Image</th> -->
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
    <?php

    $pic = mysqli_query($con, "SELECT * FROM `categories`");
    $number=0;
    while($row = mysqli_fetch_array($pic)){
      $number++;
      echo "<tr>
          <td>$number</td>
          <td>$row[Name]</td>
          
          <td><i class='fas fa-edit text-dark'></i></td>
          <td><i class='fas fa-trash text-dark'></i></td>
      
        </tr>";
      
    }
    
    ?>
  </tbody>
</table>
  </div>
</div>



</body>
</html>