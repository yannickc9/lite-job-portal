<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CV
 *
 * @author Choni
 */
class Account implements Builder  {
    //put your code here
    private $id;
    private $fullname;
    private $pseudo;
    private $bio;
    private $telephone;
    private $email;
    private $password;
    private $address;
    private $nationality;
    private $birthday;
    private $birthplace;
    private $location;

    public function __construct() {
        
    }

    public function create() {
        return $this;
    }

    public function setAttributes($attributes){
        foreach ($attributes as $attribute => $value) {
            $this->$attribute = $value;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getNationality() {
        return $this->nationality;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getBirthplace() {
        return $this->birthplace;
    }

    public function getLocation() {
        return $this->location;
    }


}