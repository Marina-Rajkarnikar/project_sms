<?php

if(isset($_GET['edit_category'])){
    $edit_id=$_GET['edit_category'];
    $get_data="Select * from `categories` where category_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];   
}

if(isset($_POST['edit_category'])){
  $category_title=$_POST['category_title'];

  $update_cat= "update `categories` set category_title='$category_title' where category_id=$edit_id";
  $result_cat=mysqli_query($con,$update_cat);
  if($result_cat){
    echo "<script>alert('Category Updated Successfully!')</script>";
    echo "<script>window.open('./admin.php?view_categories', '_self')</script>";
 }
}
?>
<container class="mt-3">
  <h1 class="text-center">Edit Category</h1>
  <form action="" method="post" class="text-center">
  <div class="form-outline w-50 mb-4 m-auto">
    <label for="category_title" class="form-label">Edit Category</label>
    <input type="text" class="form-control" name="category_title" id="category_title" required="required" value='<?php echo $category_title?>'>
</div>
<input type="submit" class="btn btn-info px-2 mb-3" name="edit_category" value="Update Category">
  </form>
</container>