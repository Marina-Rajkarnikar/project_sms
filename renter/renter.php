<?php
include('../admin/config.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
     <!-- FontAwesome Styles-->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../admin/styling.css" />
    <title>Renter Dashboard</title>
    <style>
    .vehicle_img{
    width: 100px;
    object-fit: contain;
    }
    #wrapper{
        background-color: lavender;
    }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-car me-2"></i>RENTARIDE</div>
            <div class="list-group list-group-flush my-3">
                <a href="renter.php?dashboard" class="list-group-item text-dark list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="renter.php?insert_vehicle" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-car-crash me-2"></i>Insert Vehicle</a>
                <a href="renter.php?view_vehicles" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-bus-alt me-2"></i>View Vehicles</a>
                <!-- <a href="renter.php?view_categories" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-truck me-2"></i>View Categories</a>
                <a href="admin.php?view_brands" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-motorcycle me-2"></i>View Brands</a> -->
                <a href="renter.php?view_bookings" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="far fa-money-bill-alt me-2"></i>Bookings</a>
                <a href="../admin/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>

            </nav>
            </div>
 -->
    <div class="container">
    <?php
    if(isset($_GET['dashboard'])){
        include('dashboard.php');
    }
    if(isset($_GET['insert_vehicle'])){
        include('insert_vehicle.php');
    }
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    } 
    if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
    } 
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }
    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }
    if(isset($_GET['view_vehicles'])){
            include('view_vehicles.php');
    } 
    if(isset($_GET['view_users'])){
        include('users.php');
} 
    if(isset($_GET['edit_vehicles'])){
        include('edit_vehicles.php');
    } 
    if(isset($_GET['delete_vehicles'])){
        include('delete_vehicle.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    } 
    if(isset($_GET['edit_brand'])){
        include('edit_brand.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    } 
    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
    }
    if(isset($_GET['view_bookings'])){
        include('booking.php');
    }      
    ?>
    </div>
    </div>

    <!-- /#page-content-wrapper -->
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script> -->
</body>

</html>