<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hobby
 *
 * @author Choni
 */
class Hobby {
    //put your code here
    private $id;
    private $id_cv;
    private $description;
    
    public function __construct($id, $id_cv, $description) {
        $this->id = $id;
        $this->id_cv = $id_cv;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCv() {
        return $this->id_cv;
    }

    public function getDescription() {
        return $this->description;
    }
}
