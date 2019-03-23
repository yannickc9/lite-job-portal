<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jobapplication
 *
 * @author Choni
 */
class JobApplicationManager extends Manager {
    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function save(JobApplication $job_application){
        # code...
    }

    public function getJobApplications(Sector $sector,Profession $profession,Location $location,Contract $contract,Experience $experience,Level $level){
        
        // return $job_applications;
    }

    public function update(JobApplication $job_application){
        # code...
    }

    public function remove(JobApplication $job_application){
        # code...
    }

}
