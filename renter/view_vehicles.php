<?php
include("../functions/common_function.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img{
            object-fit: contain;
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
    



<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-car fa-2x"></i> Available Vehicles</h3>
<table class="table table-bordered border-dark mt-5">
    <thead class="bg-dark text-center text-light">
        <tr>
            <th>S.No.</th>
            <th>Vehicle Name</th>
            <th>Vehicle Image</th>
            <th>Vehicle Image</th>
            <th>Vehicle Renting Price</th>
            <th colspan="2">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $user_id=get_user_id_renter();
            $pic = "SELECT * FROM `vehicles` where user_id='$user_id'";
            $result_select=mysqli_query($con,$pic);
        if (mysqli_num_rows($result_select) > 0) {
                 
            $number=0;

            while($row = mysqli_fetch_array($result_select)){
                $vehicle_id=$row['vehicle_id'];
                $vehicle_title = $row['Name'];
                $vehicle_image1 = $row['Image'];
                $vehicle_image2 = $row['Image2'];
                $vehicle_price = $row['Price'];
                $number++;
                    echo "<tr class='text-center'>
                    <td>$number</td>
                    <td>$vehicle_title</td>
                    <td><img src='../admin/vehicle_images/$vehicle_image1' class='img' alt='$vehicle_title'></td>
                    <td><img src='../admin/vehicle_images/$vehicle_image2' class='img' alt='$vehicle_title'></td>
                    <td>Rs.$vehicle_price/-</td>
                    <td><i class='fas fa-edit text-dark'></i></td>
                    <td><a href='renter.php?delete_vehicles=$vehicle_id' class='text-dark'><i class='fas fa-trash'></i></a></td>
                    </tr>";
            
                ?>
                
<?php
            }
        } else{
            echo "No Vehicles Added :(";
        }
        

?>        
    </tbody>
</table>