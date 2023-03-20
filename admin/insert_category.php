<?php

    include('config.php');
    if(isset($_POST['insert_category'])){
      $category_title=$_POST['category_title'];
      // Select data from Database
      $select_query="Select * from `categories`";
      $result_select=mysqli_query($con,$select_query);
      // $brand_exist=FALSE;
    if(mysqli_num_rows($result_select) > 0)
    {
      //  echo '<table> <tr> <th>Brand ID </th> <th> Brand Title </th>  </tr>';
       while($row = mysqli_fetch_assoc($result_select)){
         // to output mysql data in HTML table format
          // echo '<tr >  <td>' . $row["category_title"] . '</td> </tr>';
      if(($row["category_title"])==$category_title){
        echo "<script>alert('Category already exists!')</script>";
      }
      else{
        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
      }
       }
      //  echo '</table>';
    }
    }
    else{
      $insert_query="insert into `categories` (category_title) values ('$category_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
      echo "<script>alert('Category has been inserted successfully')</script>";
      echo "<script>window.open('./admin.php?view_categories', '_self')</script>";
    }
    }
  }
?>
<h2 class="text-center">Insert Category</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="category_title" placeholder="Insert Category" aria-label="categories" aria-describedby="basic-addon1" required="required">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_category" value="Insert Categories">
  
</div>
</form>