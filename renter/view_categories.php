 
 <?php

include '../admin/config.php';
include "../functions/common_function.php"
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .user_img{
      width: 100px;
    object-fit: contain;
    }
  </style>
  <title>Document</title>
 </head>
 <body>
  

 <h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class='fas fa-user'></i> Hello <?php echo $_SESSION['renter_name'] ?></h3>
 <div class="row">

    <div class="col-md-6"> 
    <h3 class="text-center py-4 text-success fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-bus fa-2x"></i> <i class="fas fa-check fa-2x"></i>  Available Categories</h3>
    <table class="table table-bordered border-dark mt-5">
  <thead class="bg-dark text-center text-light">
    <tr>
      <th>S.No.</th>
      <th>Category Name</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $get_categories="Select * from `categories` where status='true'";
            $result=mysqli_query($con,$get_categories);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
            
                ?>

    <tr class="text-center">                    
      <th><?php echo $number; ?></th>
      <th><?php echo $category_title;?></th>
      <td><a href='admin.php?edit_category=<?php echo $category_id?>' class='text-light'><i class="fas fa-edit text-dark"></i></a></td>
      <td><a href='admin.php?delete_category=<?php echo $category_id?>' class='text-light'><i class="fas fa-trash text-dark"></i></a></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
 </table>
  </div>
  </div>
  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">  
  <?php
if(isset($_POST['insert_category'])){
  $category_title=$_POST['category_title'];  
  // Select data from Database
  $select_query="Select * from `categories`";
  $result_select=mysqli_query($con,$select_query);
if(mysqli_num_rows($result_select) > 0)
{
  //  echo '<table> <tr> <th>Brand ID </th> <th> Brand Title </th>  </tr>';
   while($row = mysqli_fetch_assoc($result_select)){
     // to output mysql data in HTML table format
      // echo '<tr >  <td>' . $row["brand_title"] . '</td> </tr>';
  if(($row["category_title"])==$category_title){
    echo "<script>alert('Category already exists!')</script>";
  }
  else{
    $insert_query="insert into `categories` (brand_title,status) values ('$category_title', 'pending')";
    $result=mysqli_query($con,$insert_query);
    if($result){
    echo "<script>alert('Category has been inserted successfully')</script>";
    echo "<script>window.open('renter.php?view_brands', '_self')</script>";
  }
   }
  //  echo '</table>';
}
}

else{
  $insert_query="insert into `brands` (category_title,status) values ('$category_title,'pending')";
  $result=mysqli_query($con,$insert_query);
  if($result){
  echo "<script>alert('Category has been inserted successfully')</script>";
}
}
}
?>

<h2 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-arrow-alt-circle-down fa-2x"></i>  Insert Category</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-50 mb-2">
<span class="input-group-text bg-dark text-light" id="basic-addon1"><i class="fas fa-receipt"></i></span>
<input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-dark text-light border-0 p-2 my-3" name="insert_category" value="Insert Brands">

</div>
</form>
</div>
<div class="col-md-4"></div>
 </div>
 </body>
 </html>