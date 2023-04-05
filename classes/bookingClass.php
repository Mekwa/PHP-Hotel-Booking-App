<?php

//getters and setters within a class
//the first 'getId', gets the value of ID and then the second function 'setID', sets the value of ID and returns self so this carries on through checkInDate, checkOutDate, duration, pricing and hotelName. 

class Booking{
    private $checkInDate;
    private $checkOutDate;
    private $duration;
    private $pricing;
    private $hotelName;

    public function __construct($checkInDate, $checkOutDate, $duration, $pricing, $hotelName){

        $this->checkInDate = $checkInDate;
        $this->checkOutDate = $checkOutDate;
        $this->duration = $duration;
        $this->pricing = $pricing;
        $this->hotelName = $hotelName;
    }

    public function getCheckInDate()
    {
        return $this->checkInDate;
    }

    public function setCheckInDate($checkInDate)
    {
        $this->checkInDate = $checkInDate;
        return $this;
    }


    public function getCheckOutDate()
    {
        return $this->checkOutDate;
    }

    public function setCheckOutDate($checkOutDate)
    {
        $this->checkOutDate = $checkOutDate;
        return $this;
    }


    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }


    public function getPricing()
    {
        return $this->pricing;
    }

    public function setPricing($pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }

    public function getHotelName()
    {
        return $this->hotelName;
    }

    public function setHotelName($hotelName)
    {
        $this->hotelName = $hotelName;
        return $this;
    }
}

?>