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
class Level{
    //put your code here
    private $id;
    private $diploma;

    public function __construct($id, $diploma){
        $this->id = $id;
        $this->diploma = $diploma;
    }

    public function getId(){
        return $this->id;
    }

    public function getDiploma(){
        return $this->diploma;
    }
}
