<?php 
class Hotel{

    private $id;
    private $name;
    private $rate;
    private $amenities;
    private $location;
    private $image;

    public function __construct($id, $name, $rate, $amenities, $location, $image)
    { 
        $this->id = $id;
        $this->name = $name;
        $this->rate = $rate;
        $this->amenities = $amenities;
        $this->location = $location;
        $this->image = $image;
        
    }
    //getters and setters 
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getRate(){
        return $this->rate;
    }

    public function setRate($rate){
        $this->rate = $rate;
        return $this;
    }

    public function getAmenities(){
        return $this->amenities;
    }

    public function setAmenities($amenities){
        $this->amenities = $amenities;
        return $this;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation($location){
        $this->location = $location;
        return $this;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
        return $this;
    }
}

?>