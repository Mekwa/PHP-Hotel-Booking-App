<?php 
function countDays($date1, $date2) {
    // Calculating the difference between the two dates that the user has selected for Check-in and Check-out
    $diff = strtotime($date2) - strtotime($date1);

    
    return abs($diff / 86400);
}
?>