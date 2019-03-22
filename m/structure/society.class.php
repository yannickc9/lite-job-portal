<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of society
 *
 * @author Choni
 */
class Society {
    //put your code here
    private $id;
    private $id_employer;
    private $id_sector;
    private $name;
    private $max_employees;
    private $employees;
    private $creation_date;
    private $type;
    
    public function __construct($id, $id_employer, $id_sector, $name, $max_employees, $employees, $creation_date, $type) {
        $this->id = $id;
        $this->id_employer = $id_employer;
        $this->id_sector = $id_sector;
        $this->name = $name;
        $this->max_employees = $max_employees;
        $this->employees = $employees;
        $this->creation_date = $creation_date;
        $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function getId_employer() {
        return $this->id_employer;
    }

    public function getId_sector() {
        return $this->id_sector;
    }

    public function getName() {
        return $this->name;
    }

    public function getMax_employees() {
        return $this->max_employees;
    }

    public function getEmployees() {
        return $this->employees;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function getType() {
        return $this->type;
    }
}
