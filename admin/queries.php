<h3 class="text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-phone-alt fa-2x"></i> Customer Queries</h3>
<table class="table table-bordered border-dark mt-5">
    <thead class="bg-dark text-center text-light">
        <tr>
            <th>S.No.</th>
            <th>Sender Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $pic = mysqli_query($con, "SELECT * FROM `contact`");
            $number=0;
            while($row = mysqli_fetch_array($pic)){
            $Name = $row['Name'];
                $Email = $row['Email'];
                $Message = $row['Message'];
                $number++;
                    echo "<tr class='text-center'>
                    <td>$number</td>
                    <td>$Name</td>
                    <td>$Email</td>
                    <td>$Message</td>
                    </tr>";
            
                ?>
                
<?php
            }
        

?>        
    </tbody>
</table>