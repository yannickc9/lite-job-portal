<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of joboffer
 *
 * @author Choni
 */
class JobOfferManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function save(JobOffer $job_offer){
        # code...
    }

    public function getJobOffers(Sector $sector, Profession $profession, Location $location, Contract $contract, Experience $experience, Level $level){

        // return $job_offers;
    }

    public function update(JobOffer $job_offer){
        # code...
    }

    public function remove(JobOffer $job_offer){
        # code...
    }
}
