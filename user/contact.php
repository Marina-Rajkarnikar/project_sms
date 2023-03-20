<?php
include ('../admin/config.php');
include ('../functions/common_function.php');

if (isset($_POST['submit'])) {
    $NAME=$_POST['name'];
    $EMAIL=$_POST['email'];
    $MESSAGE=$_POST['msg'];
    $user_id = get_user_id_fromsession();
    $user_email = user_email();
    $insert = "INSERT INTO `contact`(`user_id`, `user_emai`, `Name`, `Email`, `Message`) VALUES ('$user_id',
    '$user_email','$NAME','$EMAIL','$MESSAGE')";
    $result_query = mysqli_query($con, $insert);
		if ($result_query) {  
		  echo "<script>alert('Message sent successfully')</script>";
		  echo "<script>window.open('contact.php', '_self')</script>";  
		} else {
		  echo "<script>alert('Error!')</script>";
		}
	  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../main/styles.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact</title>
    <style>
        
        .contact{
            /* padding: 50px 100px; */
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #eeeff1;
        }
        .contact .content{
            max-width: 800px;
            text-align: center;

        }
        .contact .content h2{
            font-size: 36px;
            font-weight: 500;
            color: #000;
        }
        .contact .content p{
            font-weight: 300;
            color: #000;
        }
        .container{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        .container .contactInfo{
            width: 50%;
            display: flex;
            flex-direction: column;
        }
        .container .contactInfo .box{
            position: relative;
            padding: 20px 0;
            display: flex;
        }
        .container .contactInfo .box .icon{
            min-width: 60px;
            height: 60px;
            background-color: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 22px;
        }
        .container .contactInfo .box .text{
            display: flex;
            margin-left: 20px;
            font-size: 16px;
            flex-direction: column;
            font-weight: 300;
        }
        .container .contactInfo .box .text h3{
            font-weight: 500;

        }
        .contactForm{
            width: 40%;
            padding: 40px;
            background-color: #fff;
        }
        .contactForm h2{
            font-size: 30px;
            font-weight: 500;

        }
        .contactForm .inputBox{
            position: relative;
            width: 100%;
            margin-top: 10px;
        }
        .contactForm .inputBox input,
        .contactForm .inputBox textarea{
            width: 100%;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid black;
            outline: none;
            resize: none;
        }
        /* .contactForm .inputBox{
            position: absolute;
            left: 0;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            pointer-events: none;
            transition: 0.5sec;
        } */
        .contactForm .inputBox input[type="submit"]{
            width: 100px;
            cursor: pointer;
            background-color: #000;
            color: #fff;
            padding: 10px;
            font-size: 18px;

        }
        .dropbtn {
  background-color: #4745a0;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 0.5rem;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #fe5b3d;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}


    </style>
</head>
<body>
<header>
<nav>
	<input id="nav-toggle" type="checkbox">
	<div class="logo"><strong> WELCOME </strong><?php echo $_SESSION['rentee_name'] ?></div>
	<ul class="links">
		<li><a href="userindex.php">Home</a></li>
		<li><a href="display.php">Vehicles</a></li>
		<li><a href="cart.php"><i class="fa-sharp fa-solid fa-car"></i><sup></sup></a></li>
		<li><a href="contact.php">Contact</a></li>
        <!-- <div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-user"></i> Profile</button>
				<div id="myDropdown" class="dropdown-content">
                
					<a href="#contact"><i class="fa-solid fa-bookmark"></i> My Bookings</a>
					<a href="#about"><i class="fa-solid fa-trash"></i> Delete Account</a>
				</div>
				</div>
				<script>
				function myFunction() {
				document.getElementById("myDropdown").classList.toggle("show");
				}
				window.onclick = function(event) {
				if (!event.target.matches('.dropbtn')) {
					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
					}
				}
				}
				</script> -->
		<div class="header-btn">
                 <a href="../admin/logout.php" class="sign-in">Log Out</a>       
        </div>
	</ul>
	
	<label for="nav-toggle" class="icon-burger">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</label>
</nav>
</header>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>We would love to hear from you. Please contact us at:</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>Jawalakhel,Lalitpur</p>
                        
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                            <p>marinarjkr13@gmail.com</p>   
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <p>9823544647</p>   
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="contact.php" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" required="required">
                    </div>
                    <div class="inputBox">
                        <label for="email">Email</label>
                        <input type="text" name="email" required="required">
                    </div>
                    <div class="inputBox">
                        <label for="message">Message</label>
                        <input type="text" name="msg" required="required">
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>