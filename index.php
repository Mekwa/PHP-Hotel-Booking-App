<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    
    <div class="login-block">
        <div class="booking-form">
            <div class="yourDetails">
                <form action="compare.php" method="POST">
                    
                    <h1>Afri Tour's </h1>
                    <h2>Please sign-in and provide your personal details</h2>
                    <h3>Your details:</h3>
                    <input class="one" type="text" name="name" placeholder="Name..." required />
                    <input class="one" type="text" name="lastname" placeholder="Surname..." required /> <br>
                    <input class="one-email" type="email" name="email" placeholder="Email Address..." required />
            </div>
            <div class="bookingDetails">
                <h3>Booking Details: </h3>
                <h4>Check-in Date: <input class="two" type="date" name="checkin" id="checkin" required /></h4>
                <h4>Check-out Date: <input class="two" type="date" name="checkout" id="checkout" required /></h4> <br>
            </div>

            <input class="log-in" type="submit" name="submit" value="Login" id="submit">
            
            </form>
        </div>
    </div>

    <footer>
    

      <div class="box">
        <h3>For Customers</h3>
        <ul>
          <li>About Afri Tour's</li>
          <li>Customer Care/Help</li>
          <li>Corporate Accounts</li>
          <li>Financial Information</li>
          <li>Terms & Conditions</li>
        </ul>
      </div>

      <div class="box">
        <h3>Contact Us</h3>

        <ul>
          <li>3015 Section AA, Soshanguve</li>
          <li><i class="far fa-envelope"></i>mekwa23@outlook.com </li>
          <li><i class="far fa-phone-alt"></i>012 554 4725 </li>
          <li><i class="far fa-phone-alt"></i>012 456 7898 </li>
          <li><i class="far fa-comments"></i>24/ 7 Customer Services </li>
        </ul>
      </div>
    </div>
  </footer>
</body>

</html>