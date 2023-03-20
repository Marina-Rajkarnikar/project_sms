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
    



<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fa fa-users fa-2x"></i> Rentee</h3>
<table class="table table-bordered border-dark mt-5">
    <thead class="bg-dark text-center text-light">
        <tr>
            <th>S.No.</th>
            <th>Rentee Name</th>
            <th>Rentee Email</th>
            <th>Rentee Image</th>
            <th>Rentee Credentials</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $pic = mysqli_query($con, "SELECT * FROM `user_table` where user_type='rentee'");
            $number=0;
            while($row = mysqli_fetch_array($pic)){
                $user_id=$row['id'];
                $NAME = $row['username'];
                $EMAIL = $row['email'];
                $user_image = $row['user_image'];
                $user_image2 = $row['user_image1']; 
                $number++;
                    echo "<tr class='text-center'>
                    <td>$number</td>
                    <td>$NAME</td>
                    <td>$EMAIL</td>
                    <td><img src='../user/userimages/$user_image' class='img'></td>
                    <td><img src='../user/userimages/$user_image2' class='img'></td>
                    <td><a href='admin.php?delete_user=$user_id' class='text-dark'><i class='fas fa-trash text-dark'></i></a></td>
                    </tr>";
            
                ?>
                
<?php
            }
        

?>        
    </tbody>
</table>



<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fa fa-users fa-2x"></i> Renter</h3>
<table class="table table-bordered border-dark mt-5">
    <thead class="bg-dark text-center text-light">
        <tr>
            <th>S.No.</th>
            <th>Renter Name</th>
            <th>Renter Email</th>
            <th>Renter Image</th>
            <th>Renter Credentials</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $pic = mysqli_query($con, "SELECT * FROM `user_table` where user_type='renter'");
            $number=0;
            while($row = mysqli_fetch_array($pic)){
                $user_id=$row['id'];
                $NAME = $row['username'];
                $EMAIL = $row['email'];
                $user_image = $row['user_image'];
                $user_image2 = $row['user_image1']; 
                $number++;
                    echo "<tr class='text-center'>
                    <td>$number</td>
                    <td>$NAME</td>
                    <td>$EMAIL</td>
                    <td><img src='../user/userimages/$user_image' class='img'></td>
                    <td><img src='../user/userimages/$user_image2' class='img'></td>
                    <td><a href='admin.php?delete_user=$user_id' class='text-dark'><i class='fas fa-trash text-dark'></i></a></td>
                    </tr>";
            
                ?>
                
<?php
            }
        

?>        
    </tbody>
</table>




</body>
</html>

