<?php

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    
    $delete_query="Delete from `categories` where category_id=$delete_category";
    $result_product=mysqli_query($con,$delete_query);
    if($result_product){
        echo "<script>alert('Category Deleted Successfully!')</script>";
        echo "<script>window.open('./admin.php?view_categories', '_self')</script>";
    }else{
        echo "<script>alert('Category cannot be Deleted')</script>";
    }
}

?>
