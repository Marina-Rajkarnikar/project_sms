<?php

if(isset($_GET['delete_brand'])){
    $delete_brand=$_GET['delete_brand'];
    
    $delete_query="Delete from `brands` where brand_id=$delete_brand";
    echo $delete_brand;
    $result_product=mysqli_query($con,$delete_query);
    if($result_product){
        echo "<script>alert('Brand Deleted Successfully!')</script>";
        echo "<script>window.open('./admin.php?view_brands', '_self')</script>";
    }else{
        echo "<script>alert('Brand cannot be Deleted')</script>";
    }
}

?>
