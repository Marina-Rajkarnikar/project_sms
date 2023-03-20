<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<h3 class="text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-motorcycle fa-2x"></i>  Available Brands</h3>
 

<div class="row">
  <div class="col-md-3">
  <h2 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-arrow-circle-down fa-2x"></i>  Insert Brand</h2>

<form action="" method="post" class="mb-5 mt-5">
<div class="input-group w-100 mb-2">
  <span class="input-group-text bg-dark text-light" id="basic-addon1"><i class="fas fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="brands" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-dark text-light border-0 p-2 my-3" name="insert_brand" value="Insert Brand">
  
</div>
</form>
  </div>

<div class="col-md-9">
<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-motorcycle fa-2x"></i>  Available Brands</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-dark text-light text-center">
    <tr>
      <th>S.No.</th>
      <th>Brand Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $get_brands="Select * from `brands`";
            $result=mysqli_query($con,$get_brands);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
            
                ?>

    <tr class="text-center">
      <th><?php echo $number; ?></th>
      <th><?php echo $brand_title;?></th>
      <td><a href='admin.php?edit_brand=<?php echo $brand_id?>' class='text-light'><i class="fas fa-edit text-dark"></i></a></td>
      <td><a href='admin.php?delete_brand=<?php echo $brand_id?>' type="button" class="text-light"><i class="fas fa-trash text-dark"></i></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
 </table>
 </div>
 </div>
 <?php

    include('config.php');
    if(isset($_POST['insert_brand'])){
      $brand_title=$_POST['brand_title'];
      
      // Select data from Database
      
      $select_query="Select * from `brands`";
      $result_select=mysqli_query($con,$select_query);

      // $brand_exist=FALSE;
    if(mysqli_num_rows($result_select) > 0)
    {
      //  echo '<table> <tr> <th>Brand ID </th> <th> Brand Title </th>  </tr>';
       while($row = mysqli_fetch_assoc($result_select)){
         // to output mysql data in HTML table format
          // echo '<tr >  <td>' . $row["brand_title"] . '</td> </tr>';
      if(($row["brand_title"])==$brand_title){
        echo "<script>alert('Brand already exists!')</script>";
      }
      else{
        $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
        echo "<script>alert('Brand has been inserted successfully')</script>";
        echo "<script>window.open('./admin.php?view_brands', '_self')</script>";
      }
       }
      //  echo '</table>';
    }
  }

    else{
      $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
      echo "<script>alert('Brand has been inserted successfully')</script>";
    }
    }
  }
?>

<!-- // if(mysqli_num_rows($result_select) > 0){
        // $select_query="Select * from `brands`";
        // $result_query=mysqli_query($con,$select_query)
    //     foreach($result_select as $value){
    //     if(mysqli_num_rows(['$brand_title']==$brand_title)){
          // echo "<script>alert('Brand already exists!')</script>";
    //     }
    //   else{
    //     $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
    //     $result=mysqli_query($con,$insert_query);
    //     if($result){
    //     echo "<script>alert('Brand has been inserted successfully')</script>";
    //   }
    //   }
    // }
  // } -->



</body>
</html>
