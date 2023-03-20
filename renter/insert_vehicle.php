<?php
include "../functions/common_function.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST['upload'])) {
  $NAME = $_POST['name'];
    $DESCRIPTION = $_POST['description'];
    $KEYWORDS = $_POST['keywords'];
    $BRAND = $_POST['brand'];
  $IMAGE = $_FILES['image']['name'];
  $PICTURE = $_FILES['picture']['name'];
  $PHOTO = $_FILES['photo']['name'];
  $PICIMG = $_FILES['picimg']['name'];
  $TEMPIMAGE = $_FILES['image']['tmp_name'];
  $TEMPPICTURE = $_FILES['picture']['tmp_name'];
  $TEMPPHOTO = $_FILES['photo']['tmp_name'];
  $TEMPPICIMG = $_FILES['picimg']['tmp_name'];
    $PRICE = $_POST['price'];
    // $CATEGORY = $_FILES['category'];
  // print_r($_FILES['image']);
  // print_r($_FILES['picture']);
  // $img_loc = $_FILES['image']['tmp_name'];
  // $img_place = $_FILES['picture']['tmp_name'];
  // $img_name = $_FILES['image']['name'];
  // $img_title = $_FILES['picture']['name'];
  // $img_des = "uploadimages/" . $img_name;
  // $img_area = "uploadimages/" . $img_title;
  move_uploaded_file($TEMPIMAGE, "../admin/vehicle_images/$IMAGE");
  move_uploaded_file($TEMPPICTURE, "../admin/vehicle_images/$PICTURE");
  move_uploaded_file($TEMPPHOTO, "../admin/vehicle_images/$PHOTO");
  move_uploaded_file($TEMPPICIMG, "../admin/vehicle_images/$PICIMG");
  //insert data
  $user_id = get_user_id_renter();
  mysqli_query($con, "INSERT INTO `vehicles`(`user_id`, `Name`, `Description`, `Keywords`, `Brand`, `Image`, `Image2`, `Image3`, `Image4`, `Price`) VALUES ('$user_id','$NAME','$DESCRIPTION','$KEYWORDS','$BRAND','$IMAGE','$PICTURE','$PHOTO','$PICIMG','$PRICE')");
}
?>
 <h2 class="text-center py-4  text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user fa-2x"></i> Hello <?php echo $_SESSION['renter_name'] ?></h2>    

<h1 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-car-crash fa-2x"></i>  Add a Vehicle! </h1>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">Vehicle Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Vehicle Name" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Vehicle Description</label>
                <input type="text" name="description" class="form-control" placeholder="Enter Vehicle Description" autocomplete="off" required="required">
            </div>
            <!-- Keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Vehicle Keywords</label>
                <input type="text" name="keywords" class="form-control" placeholder="Enter Vehicle Keywords" autocomplete="off" required="required">
            </div>
            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand" class="form-label">Vehicle Brand</label>
                <select name="brand" class="form-select" required="required">
                    <option value="">Select a Brand</option>
                    <?php

                                $select_query="Select * from `brands`";
                                $result_select=mysqli_query($con,$select_query);
                                // $brand_exist=FALSE;
                              if(mysqli_num_rows($result_select) > 0)
                              {
                                //  echo '<table> <tr>  <th> Brand Title </th>  </tr>';
                                 while($row = mysqli_fetch_assoc($result_select)){
                                    
                                   // to output mysql data in HTML table format
                                    // echo '<tr >  <td>' . $row["brand_title"] . '</td> <br/></tr>';
                                    // echo "<option value="$brand_title">'" $brand_title"'</option>";
                                    echo "<option value='".$row['brand_id']."'>".$row['brand_title']."</option>";
                                //  echo '</table>';
                              }
                            }
                            // else{
                            //   echo "You donot have any brand!";
                            // }
                        // $select_query="Select * from `brands`";
                        // $result_query=mysqli_query($con,$select_query);
                        // while($row=mysqli_fetch_assoc($result_query)){
                        //     $brand_title=$row['$brand_title'];
                        //     $brand_id=$row['$brand_id'];
                        //     echo "<option value='$brand_id'>$brand_title</option>";
                        // }
                    
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="image" class="form-label" required="required">Vehicle Image 1</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="picture" class="form-label" required="required">Vehicle Image 2</label>
                <input type="file" name="picture" class="form-control" >
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="photo" class="form-label">Vehicle Image 3</label>
                <input type="file" name="photo" class="form-control" required="required">
            </div>
             <!-- Image 4 -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="picimg" class="form-label">Vehicle Image 4</label>
                <input type="file" name="picimg" class="form-control" required="required">
            </div>
            
            
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label" required="required">Vehicle Renting Price Per Day</label>
                <input type="text" name="price" class="form-control" placeholder="Enter Vehicle Renting Price Per Day" autocomplete="off" >
            </div>
            
            <button name="upload" class="bg-dark text-light border-0 p-2 my-3">Insert Vehicle</button>

        </body>
</html>