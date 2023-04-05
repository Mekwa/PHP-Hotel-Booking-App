<?php
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1); 
    error_reporting(E_ALL); 

    
    require "functions/countingDaysFunctions.php"; 
    require "functions/hotelFunction.php";
    require "classes/customer.php";
    require "classes/hotels.php";
    require "classes/bookingClass.php";

    session_start(); //creates a session or resumes a session based on a POST or GET request

    $hotelChoice; 

    //checks for the variable 'book-hotel', creates a super global 'book-hotel' that can be used across all pages
    if(isset($_POST['book-hotel'])) { 
        try { 
            newHotels("hotels/hotelInfo.json");
        } catch (Exception $err) {
            echo "<script> console.log('Server error when loading hotels..' + $err) </script>";
        }
        
        foreach ($_SESSION['hotels'] as $hotel) { 
            if ($hotel->getName() == $_POST['choice']){
                $hotelChoice = $hotel;
            }
        }

        try{ 
            $booking = new Booking(
                $_SESSION['checkin'],
                $_SESSION['checkout'],
                $_SESSION['numberOfDays'],
                $_POST['cost'],
                $hotelChoice->getName()
            );
        } catch (Exception $err){
            echo "<script> console.log('Server error while creating the booking.' + $err)</script>"; 
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Summary</title>
    <link rel="stylesheet" href="css/booking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="information">
        <h1>Last final step we are almost done! <?php echo $_SESSION['user']->getName() ?>...</h1>

        <p>We're about to send all the following information to the hotel you've chosen</p>
        <p>Please make sure that all your information is correct</p>
        <form method="post" name="sendEmail" action="email.php">
            <div class="personal-information">
                <h2>Personal Information</h2>

                <!-- These php tags holds the information for the hotel the client has chosen.--> 
                
                <?php
        echo '
        <ul> Name: '.$_SESSION['user']->getName().' '.$_SESSION['user']->getLastName().'</ul>
        <ul> Email Address: '.$_SESSION['user']->getEmail().'</ul>';
        ?>
            </div>
            <div class="hotel-of-choice">
                <h2>Hotel Information</h2>
                <?php
        echo '
        <ul> Hotel: '.$hotelChoice->getName().'</ul>
        <ul> Daily Rate: R '.$hotelChoice->getRate().',00 </ul>';
        ?>
            </div>
            <div class="booking-information">
                <h2>Booking Information</h2>
                <?php echo '
        <ul> Duration of Stay: '.$booking->getDuration().'</ul>
        <ul> Arriving on: '.$booking->getCheckInDate().'</ul>
        <ul> Leaving on: '.$booking->getCheckOutDate().'</ul>
        ' ?>
            </div>
            <div class="total">
                <?php echo'
        <ul> Total for your entire stay in your Hotel of choice: R '.$booking->getPricing().',00 </ul>
        '; ?>
            </div>
            <button class="submit">
                <a style="text-decoration: none; color: black;" href="email.php">Confirm booking</a>
            </button>
            <button class="log-out">
                <a style="text-decoration: none; color: white;" href="index.php">Sign Out</a>
            </button>
        </form>
    </div>
</body>

</html>