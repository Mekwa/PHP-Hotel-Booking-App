<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  
session_start(); //creates a session or resumes a session based on a POST or GET request


require "functions/countingDaysFunctions.php"; 
require "functions/hotelFunction.php";
require "classes/customer.php";
require "classes/hotels.php";
require "classes/bookingClass.php";


if(isset ($_POST['submit'])) { 
    $_SESSION['user'] = new User(
        $_POST['name'],
        $_POST['lastname'],
        $_POST['email']
    );
    
    try {
        newHotels("hotels/hotelInfo.json");
    } catch (Exception $err) { 
        echo "<script> console.log('Server error' + $err) </script>";
    }

   
    try {
        $numberOfDays = countDays($_POST['checkin'], $_POST['checkout']);
    } catch (Exception $err) {
        echo "<script> console.log('Server error when calculating length of stay' + $err) </script>";
    }
    
    $_SESSION['numberOfDays'] = $numberOfDays; 
    $_SESSION['checkin'] = $_POST['checkin'];
    $_SESSION['checkout'] = $_POST['checkout'];
}
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Hotels</title>
    <link rel="stylesheet" href="css/listings.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- Google fonts that are being imported to be used within the application -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<header>
    <div class="right">
        <button class="log-out">
            <a style="text-decoration: none; color: white;" href="index.php">Log out</a>
        </button>
    </div>
</header>

<body>
    <div class="hotel-compare">
        <div class="headings">
            <h1>Hotels available on the dates you have chosen </h1>
            <h3>Please select your favorite hotel, and we will help you book it! </h3>
        </div>
        <?php foreach($_SESSION['hotels'] as $hotel){
            echo '
            <div class="container">
                <div class="image-card">
                <figure class="image"> 
                    <img src="'. $hotel->getImage() .'" alt="Placeholder Image">
                    </figure>
                </div>
                <div class="text-card">
                <div class="content-card"> 
                    <div class="booking">
                        <div class="booking-content">
                            <p class="title">'.$hotel->getName() .' </p> 
                            <p class="location">Location: '.$hotel->getLocation().'</p>
                        </div>
                    </div>
                </div>
            
                <div class="content">
                    <p>Number of days: '.$numberOfDays.'</p>
                    <p> 
                    Hotel Features: <ul>';
                    foreach ($hotel->getAmenities() as $amenities) {
                        echo "<li>$amenities</li>";
                    }
                    echo '
                    </ul>
                    </p>
                    <p>Daily Rate: R '.$hotel->getRate() .',00</p>
                    <p class="totalCost">Total Cost: R '. $hotel->getRate() * $numberOfDays .',00
                    </p>
                    <form action="booking.php" method="POST" class="form">
                    <input type="hidden" name="rate" value="'. $hotel->getRate() .'">
                    <input type="hidden" name="cost" value="'. $hotel->getRate() * $numberOfDays .'">
                    <input type="hidden" name="choice" value="'. $hotel->getName() .'">
                    <input class="button" type="submit" name="book-hotel" value="Book">
                    </form>
                </div>
                </div>
            </div>
            ';
        }?>
    </div>
</body>

</html>