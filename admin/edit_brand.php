<?php

if(isset($_GET['edit_brand'])){
    $edit_id=$_GET['edit_brand'];
    $get_data="Select * from `brands` where brand_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];   
}

if(isset($_POST['edit_brand'])){
  $category_title=$_POST['brand_title'];

  $update_brand= "update `brands` set category_title='$brand_title' where brand_id=$edit_id";
  $result_brand=mysqli_query($con,$update_brand);
  if($result_brand){
    echo "<script>alert('Category Updated Successfully!')</script>";
    echo "<script>window.open('./admin.php?view_brands', '_self')</script>";
 }
}
?>
<container class="mt-3">
  <h1 class="text-center">Edit Category</h1>
  <form action="" method="post" class="text-center">
  <div class="form-outline w-50 mb-4 m-auto">
    <label for="brand_title" class="form-label">Edit Brand</label>
    <input type="text" class="form-control" name="brand_title" id="brand_title" required="required" value='<?php echo $brand_title?>'>
</div>
<input type="submit" class="btn btn-info px-2 mb-3" name="edit_brand" value="Update Brand">
  </form>
</container>