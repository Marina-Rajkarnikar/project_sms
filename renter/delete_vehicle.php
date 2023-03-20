<?php

if(isset($_GET['delete_vehicles'])){
    $delete_id=$_GET['delete_vehicles'];
    // echo $delete_id;
    //delete query
    $delete_query="Delete from `vehicles` where vehicle_id=$delete_id";
    $result_product=mysqli_query($con,$delete_query);
    if($result_product){
        echo "<script>alert('Vehicle Deleted Successfully!')</script>";
        echo "<script>window.open('./renter.php?view_vehicles', '_self')</script>";
    }
}

?>
