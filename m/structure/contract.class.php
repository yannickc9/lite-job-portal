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
class Contract{
    //put your code here
    private $id;
    private $type;
    private $name;

    public function __construct($id,$type,$name){
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }

    public function getType(){
        return $this->type;
    }

    public function  getName(){
        return $this->name;
    }

}
