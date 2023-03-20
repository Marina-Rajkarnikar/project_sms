<?php

include 'config.php';
include('../functions/common_function.php');

// session_start();

// if(!isset($_SESSION['admin_name'])){
//    header('location:admin_login.php');
// }

?>

<h3 class="text-center py-4 text-danger fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-edit fa-2x text-danger"></i> PENDING BOOKINGS</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light text-center">
        <tr>
            <th>User ID</th>
            <th>User Email</th>
            <th>Vehicle Name</th>
            <th>Vehicle Image</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Vehicle Renting Price</th>
            <th>Status</th>
            <th colspan="2">Operations</th>
        </tr>
    </thead>
    <?php
    $query = "Select booking_id, book_details.user_id, email, Name, Image,  pickupdate, dropoffdate, 
DATEDIFF(dropoffdate,pickupdate)*price as vehicle_price, book_details.status
    from `book_details`, `vehicles` 
    where book_details.vehicle_id=vehicles.vehicle_id AND book_details.status='pending'";
$result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>
    <tbody class="text-center">
    <tr>
    <td><?php echo $row['user_id'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['Name'] ?></td>
    <td><?php echo $row['Image'] ?></td>
    <td><?php echo $row['pickupdate'] ?></td>
    <td><?php echo $row['dropoffdate'] ?></td>
    <td><?php echo $row['vehicle_price'] ?></td> 
    <td><?php echo $row['status'] ?></td> 
    
    
    <td>
        <form action="admin.php?view_bookings" method="POST">
        <button type='submit' name='approve' value= <?php echo $row['booking_id'] ?>>Approve</button>
        <button type='submit' name='delete' value=<?php echo $row['booking_id'] ?>>Delete</button>
        </form>
    </td>
<?php
        }
    }else{
        echo "No Pending Requests!";
    }
?>

</table>
<?php
if(isset($_POST['approve']) && intval($_POST['approve'])){
    $booking_id = $_POST['approve'];
    // echo "<script>alert('$user_id')</script>";
    $update = "UPDATE book_details set status = 'approved' where booking_id = '$booking_id'";
    $result = mysqli_query($con, $update);
    
        
        if ($result===TRUE) {
            echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
        echo "Not Updated!";
    }
}
if(isset($_POST['delete']) && intval($_POST['delete'])){
    $booking_id = $_POST['delete'];
    $delete = "DELETE from  book_details where booking_id = '$booking_id'";
    $result = mysqli_query($con, $delete);
    if ($result===TRUE) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
        echo "Not Updated!";
    }
}
?>
<h3 class="text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-check-circle fa-2x"></i> APPROVED BOOKINGS</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-dark text-light text-center">
        <tr>
            <th>User ID</th>
            <th>Email</th>
            <th>Vehicle Name</th>
            <th>Vehicle Image</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Vehicle Renting Price</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <?php
    $query = "Select booking_id, book_details.user_id, email, Name, Image, pickupdate, dropoffdate, 
    DATEDIFF(dropoffdate,pickupdate)*price as vehicle_price, book_details.status
        from `book_details`, `vehicles` 
        where book_details.vehicle_id=vehicles.vehicle_id AND book_details.status='approved'";
$result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { ?>
    <tbody class="text-center">
    <tr>
    <td><?php echo $row['user_id'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['Name'] ?></td>
    <td><?php echo $row['Image'] ?></td>
    <td><?php echo $row['pickupdate'] ?></td>
    <td><?php echo $row['dropoffdate'] ?></td>
    <td><?php echo $row['vehicle_price'] ?></td> 
    <td><?php echo $row['status'] ?></td> 
<?php
        }
    }else{
        echo "No result!";
    }
?>
</table>
