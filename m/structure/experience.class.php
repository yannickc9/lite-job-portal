<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formation
 *
 * @author Choni
 */
class Experience {
    //put your code here
    private $id;
    private $society;
    private $type;
    private $description;
    private $start_date;
    private $end_date;
    
    public function __construct($id, $society, $type, $description, $start_date, $end_date) {
        $this->id = $id;
        $this->society = $society;
        $this->type = $type;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getSociety() {
        return $this->society;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }
}
