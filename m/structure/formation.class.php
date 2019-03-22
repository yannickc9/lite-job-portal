<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * location of formation
 *
 * @author Choni
 */
class Formation {
    //put your code here
    private $id;
    private $name;
    private $institute;
    private $document;
    private $location;
    private $start_date;
    private $end_date;
    
    public function __construct($id, $name, $institute, $document, $location, $start_date, $end_date) {
        $this->id = $id;
        $this->name = $name;
        $this->institute = $institute;
        $this->document = $document;
        $this->location = $location;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getInstitute() {
        return $this->institute;
    }
    
    public function getDocument() {
        return $this->document;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }
}
