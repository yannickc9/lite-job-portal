<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of job_offer
 *
 * @author Choni
 */
class JobOffer implements Builder {
    //put your code here
    private $id;
    private $id_society;
    private $id_employer;
    private $id_profession;
    private $description;
    private $genre;
    private $contract_type;
    private $min_experience;
    private $salary;
    private $studies_level;
    private $location;
    private $duration;
    private $duration_unit;
    private $post_datetime;


    public function __construct() {
        
    }

    public function create() {
        return $this;
    }

    public function setAttributes($attributes) {
        foreach ($attributes as $attribute => $value) {
            $this->$attribute = $value;
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdSociety() {
        return $this->id_society;
    }

    public function getIdEmployer() {
        return $this->id_employer;
    }

    public function getIdProfession() {
        return $this->id_profession;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getContractType() {
        return $this->contract_type;
    }

    public function getMinExperience() {
        return $this->min_experience;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getStudiesLevel() {
        return $this->studies_level;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getDurationUnit() {
        return $this->duration_unit;
    }

    public function getPostDatetime() {
        return $this->post_datetime;
    }
}
