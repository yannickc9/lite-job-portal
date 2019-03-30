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
    private $id_cv;
    private $diploma;
    private $domain;

    public function __construct($id,$id_cv,$diploma,$domain){
        $this->id = $id;
        $this->id_cv = $id_cv;
        $this->diploma = $diploma;
        $this->domain = $domain;
    }

    public function getId(){
        return $this->id;
    }

    public function getIdCV(){
        return $this->id_cv;
    }

    public function getDiploma(){
        return $this->diploma;
    }

    public function getDomain(){
        return $this->domain;
    }
}
