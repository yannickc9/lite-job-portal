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
        $this->pdo->beginTransaction();
        $request = $this->pdo->prepare( 'INSERT INTO job_application(id_account,id_profession,type,description,duration,duration_unit,experience,min_salary,location) VALUES(:id_account,:id_profession,:type,:description,:duration,:duration_unit,:experience,:min_salary,:location)');
        return $request->execute(array(
            'id_account' => $job_application->getIdAccount(),
            'id_profession' => $job_application->getIdProfession(),
            'type' => $job_application->getType(),
            'description' => $job_application->getDescription(),
            'duration' => $job_application->getDuration(),
            'duration_unit' => $job_application->getDurationUnit(),
            'experience' => $job_application->getExperience(),
            'min_salary' => $job_application->getMinSalary(),
            'location' => $job_application->getLocation()
        ));
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
