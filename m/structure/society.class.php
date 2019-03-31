<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of society
 *
 * @author Choni
 */
class Society implements Builder{
    //put your code here
    private $id;
    private $id_employer;
    private $id_sector;
    private $name;
    private $description;
    private $address;
    private $location;
    private $telephone;
    private $email;
    private $website;
    private $employees;
    private $creation_date;
    private $type;
    
    public function __construct() {
        
    }

    public function create() {
        
    }

    public function setAttributes($attributes, $values) {
        $length = count($attributes);
        for($i=0; $i<$length; $i++){
            $this->$attributes[$i] = $values[$i]; 
        }
    }
    public function getId() {
        return $this->id;
    }

    public function getIdEmployer() {
        return $this->id_employer;
    }

    public function getIdSector() {
        return $this->id_sector;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getWebsite() {
        return $this->website;
    }
    
    public function getEmployees() {
        return $this->employees;
    }

    public function getCreationDate() {
        return $this->creation_date;
    }

    public function getType() {
        return $this->type;
    }
}
