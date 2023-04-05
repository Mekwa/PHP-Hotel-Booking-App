<?php
//getters and setters within a class
//the first 'getId', gets the value of ID,

class User {
    private $name;
    private $lastname;
    private $email;

    public function __construct($name, $lastname, $email) 
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
    }

    public function getName(){
        return $this->name;
    } 

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    
}
?>