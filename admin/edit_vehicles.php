<?php
if(isset($_GET['edit_vehicles'])){
    $edit_id=$_GET['edit_vehicles'];
    // echo $edit_id;
    $get_data="Select * from `vehicles` where vehicle_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $vehicle_title=$row['Name'];
    // echo $vehicle_title;
    $vehicle_description=$row['Description'];
    $vehicle_keywords=$row['Keywords'];
    // $category_id=$row['category_id'];
    // $brand_id=$row['brand_id'];
    $vehicle_image1=$row['Image'];
    $vehicle_image2=$row['Image2'];  
    $vehicle_price=$row['Price'];


    //fetching category name
    // $select_category="Select * from `categories` where category_id=$category_id";
    // $result_category=mysqli_query($con,$select_category);
    // $row_category=mysqli_fetch_assoc($result_category);
    // $category_title=$row_category['category_title'];
    // echo $category_title;

    //fetching brand name
    // $select_brand="Select * from `brands` where brand_id=$brand_id";
    // $result_brand=mysqli_query($con,$select_brand);
    // $row_brand=mysqli_fetch_assoc($result_brand);
    // $brand_title=$row_brand['brand_title'];
    // echo $brand_title;
}

?>


<div class="container mt-5">
    <h1 class="text-center">Edit Vehicle</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Name -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="name" class="form-label">Vehicle Title</label>
            <input type="text" value="<?php echo $vehicle_title?>" name="name" class="form-control">
        </div>
        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Vehicle Description</label>
                <input type="text" value="<?php echo $vehicle_description?>" name="description" class="form-control">
            </div>
            <!-- Keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Vehicle Keywords</label>
                <input type="text" value="<?php echo $vehicle_keywords?>" name="keywords" class="form-control">
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image" class="form-label">Vehicle Image 1</label>
                <input type="file" name="image" class="form-control" >
                <img src="./vehicle_images/<?php echo $vehicle_image1?>" alt="" class="form-control">
                
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="picture" class="form-label">Vehicle Image 2</label>
                <input type="file" name="picture" class="form-control" >
                <img src="./vehicle_images/<?php echo $vehicle_image2?>" alt="" class="vehicle_img">
            </div>
             
            <!-- Image 1
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="vehicle_image1" class="form-label">Vehicle Image 1</label>
                <div class="d-flex">
                <input type="file" name="vehicle_image1" id="vehicle_image1" class="form-control w-90 m-auto" >
                </div>
                <img src="./vehicle_images/" alt="" class="vehicle_img">
            </div>
            Image 2
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="vehicle_image2" class="form-label">Vehicle Image 2</label>
                <div class="d-flex">
                <input type="file" name="vehicle_image2" id="vehicle_image2" class="form-control" >
                </div>
                <img src="./vehicle_images/" alt="" class="vehicle_img">
            </div> -->
            <!-- Image 3 -->
            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="vehicle_image3" class="form-label">Vehicle Image 3</label>
                <div class="d-flex">
                <input type="file" name="vehicle_image3" id="vehicle_image3" class="form-control" >
                </div>
                <img src="./vehicle_images/<?php echo $vehicle_image3?>" alt="" class="vehicle_img">
            </div> -->
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label">Vehicle Renting Price Per Day</label>
                <input type="text" value="<?php echo $vehicle_price?>" name="price" class="form-control">
            </div>
            <!-- Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="edit_vehicles" class="btn btn-info mb-3 px-3" value="Update Vehicle">
            </div>
    </form>
</div>


<!-- Editing Vehicles -->
<?php

    if(isset($_POST['edit_vehicles'])){
        $vehicle_title=$_POST['name'];
        $vehicle_desc=$_POST['description'];
        $vehicle_keywords=$_POST['keywords'];
        // $vehicle_category=$_POST['vehicle_category'];
        // $vehicle_brands=$_POST['vehicle_brands'];
        $vehicle_price=$_POST['price'];

        $vehicle_image11=$_FILES['image']['name'];
        $vehicle_image22=$_FILES['picture']['name'];
        // $vehicle_image33=$_FILES['vehicle_image3']['name'];

        $temp_image11=$_FILES['image']['tmp_name'];
        $temp_image22=$_FILES['picture']['tmp_name'];
        // $temp_image33=$_FILES['vehicle_image3']['tmp_name'];
        

if($vehicle_image11=='')
{
        $vehicle_image11 = $vehicle_image1;
        $temp_image11=$_FILES['vehicle_image11']['tmp_name'];

} if($vehicle_image22=='')
{
        $vehicle_image22 = $vehicle_image2;
        $temp_image22=$_FILES['vehicle_image22']['tmp_name'];

}       //checking empty condition
        // if($vehicle_title=='' or $vehicle_description=='' or $vehicle_keywords=='' or $vehicle_category==''
        // or $vehicle_brands=='' or $vehicle_price=='' or $vehicle_image1=='' or $vehicle_image2=='' 
        // or $vehicle_image3==''){
        //     echo "<script>alert('Please fill all the available fields!')</script>";
        // }
            move_uploaded_file($temp_image11, "./vehicle_images/$vehicle_image11");
            move_uploaded_file($temp_image22, "./vehicle_images/$vehicle_image22");
            // move_uploaded_file($temp_image33, "./vehicle_images/$vehicle_image33");
            //update query
            // echo $edit_id;
            $update_vehicle= "UPDATE `vehicles` SET Name='$vehicle_title',
             Description='$vehicle_desc',
             Image='$vehicle_image11', Image2='$vehicle_image22',
             Price='$vehicle_price' where vehicle_id=$edit_id";
             if(mysqli_query($con,$update_vehicle)){
                echo "<script>alert('Vehicle Updated Successfully!')</script>";
                echo "<script>window.open('./admin.php?view_vehicles.php', '_self')</script>";
             }
             else{
                echo "ERROR: Could not able to execute " . mysqli_error($con);;

             }
            
        }
    

?>