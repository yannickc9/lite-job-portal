<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of language
 *
 * @author Choni
 */
class Diploma{
    //put your code here
    private $id;
    private $designation;
    private $description;

    public function __construct($id, $designation, $description){
        $this->id = $id;
        $this->designation = $designation;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }

    public function getDesignation(){
        return $this->designation;
    }

    public function  getDescription(){
        return $this->description;
    }
}
