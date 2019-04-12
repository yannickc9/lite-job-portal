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
class ExperienceDuration{
    //put your code here
    private $id;
    private $duration;
    private $label;

    public function __construct($id, $duration, $label){
        $this->id = $id;
        $this->duration = $duration;
        $this->label = $label;
    }

    public function getId(){
        return $this->id;
    }

    public function getDuration(){
        return $this->duration;
    }

    public function  getLabel(){
        return $this->label;
    }
}
