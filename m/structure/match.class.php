<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of match
 *
 * @author Choni
 */
class Match {
    //put your code here
    private $id;
    private $id_offer;
    private $id_job_application;
    private $interview_datetime;
    private $match_datetime;
    
    public function __construct($id, $id_offer, $id_job_application, $interview_datetime, $match_datetime) {
        $this->id = $id;
        $this->id_offer = $id_offer;
        $this->id_job_application = $id_job_application;
        $this->interview_datetime = $interview_datetime;
        $this->match_datetime = $match_datetime;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdOffer() {
        return $this->id_offer;
    }

    public function getIdJobApplication() {
        return $this->id_job_application;
    }

    public function getInterviewDatetime() {
        return $this->interview_datetime;
    }

    public function getMatchDatetime() {
        return $this->match_datetime;
    }
}
