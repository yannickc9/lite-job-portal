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
class Language {
    //put your code here
    private $id;
    private $id_cv;
    private $iso_code;
    
    public function __construct($id, $id_cv, $iso_code) {
        $this->id = $id;
        $this->id_cv = $id_cv;
        $this->iso_code = $iso_code;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCv() {
        return $this->id_cv;
    }

    public function getIsoCode() {
        return $this->iso_code;
    }
}
