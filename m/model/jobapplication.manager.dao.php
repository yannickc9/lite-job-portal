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
        $sql = "SELECT * FROM job_application WHERE desccription LIKE %".$q."% ";
        if(!is_null ($sector) && !is_null($profession) && !is_null($sector) && !is_null($location) && !is_null($contract) && !is_null($experience) && !is_null($level)){
            $request = $this->pdo->query($sql);
            $request->execute();
        } else{
             $filters = array();
            if(!is_null ($sector)){
                 $sql .= "AND id_sector = :id_sector";
                array_merge($filters,array('id_sector' => $sector->getId()));
            }
            if(!is_null ($profession)){
                 $sql .= "AND id_profession = :id_profession";
                array_merge($filters,array('id_profession' => $profession->getId()));
            }
            if(!is_null ($location)){
                 $sql .= "AND location = :location";
                array_merge($filters,array('location' => $location));
            }
            if(!is_null ($contract)){
                 $sql .= "AND type = :type";
                array_merge($filters,array('type' => $contract->getType()));
            }
            if(!is_null ($experience)){
                 $sql .= "AND min_experience = :min_experience";
                array_merge($filters,array('min_experience' => $experience));
            }
            if(!is_null ($level)){
                 $sql .= "AND level = :level";
                array_merge($filters,array('level' => $level));
            }
            $request = $this->pdo->prepare($sql);
            $request->execute($filters);
        }
        $job_applications = array();
        while($response = $request->fetch(PDO::FETCH_OBJ))
            $job_applications[] = $response;
        return $job_applications;
    }

    public function update(JobApplication $job_application){
        # code...
    }

    public function remove(JobApplication $job_application){
        # code...
    }

}
