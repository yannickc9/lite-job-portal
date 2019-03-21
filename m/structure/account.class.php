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

    public function setAttributes($attributes, $values){
        $length = count($attributes);
        for($i=0; $i<$length; $i++){
            $this->$attributes[$i] = $values[$i]; 
        }
    }

}