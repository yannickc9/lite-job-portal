<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cv
 *
 * @author Choni
 */
class EmployerManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }


    public function add(Employer $employer,Society $society){
        $request = $this->pdo->prepare( 'INSERT INTO society(id_employer,id_sector,name,description,address,location,telephone,email,website,employees,type) VALUES(:id_employer,:id_sector,:name,:description,:address,:location,:telephone,:email,:website,:employees,:type)');
        return $request->execute(array(
            'id_employer' => $employer->getId(),
            'id_sector' => $society->getIdSector(),
            'name' => $society->getName(),
            'description' => $society->getDescription(),
            'address' => $society->getAddess(),
            'location' => $society->getLocation(),
            'telephone' => $society->getTelephone(),
            'email' => $society->getEmail(),
            'website' => $society->getWebsite(),
            'employees' => $society->getEmployees(),
            'type' => $society->getType() 
        ));
    }

    public function update(Society $society){
        # code...
    }

    public function remove(Society $society){
        # code...
    }
}
