<?php

if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'];
    
    $delete_query="Delete from `user_table` where user_id=$delete_id";
    // echo $delete_id;
    $result_product=mysqli_query($con,$delete_query);
    if($result_product){
        echo "<script>alert('User Deleted Successfully!')</script>";
        echo "<script>window.open('./admin.php?view_brands', '_self')</script>";
    }else{
        echo "<script>alert('User cannot be Deleted')</script>";
    }
}

?>
