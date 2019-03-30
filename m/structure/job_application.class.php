<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of job_application
 *
 * @author Choni
 */
class JobApplication implements Builder{
    //put your code here
    private $id;
    private $id_account;
    private $id_profession;
    private $type;
    private $description;
    private $duration;
    private $duration_unit;
    private $experience;
    private $min_salary;
    private $location;
    private $application_datetime;
    private $last_update_datetime;


    public function __construct() {
        
    }

    public function create() {
        return $this;
    }

    public function setAttributes($attributes, $values) {
        $length = count($attributes);
        for($i=0; $i<$length; $i++){
            $this->$attributes[$i] = $values[$i]; 
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdAccount() {
        return $this->id_account;
    }

    public function getIdProfession() {
        return $this->id_profession;
    }

    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getDurationUnit() {
        return $this->duration_unit;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function getMinSalary() {
        return $this->min_salary;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getApplicationDatetime() {
        return $this->application_datetime;
    }

    public function getLastUpdateDatetime() {
        return $this->last_update_datetime;
    }
}
