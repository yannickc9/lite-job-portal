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

    public function getEmployers(Sector $sector,Location $location){
       $sql = "SELECT E.* FROM employer E INNER JOIN society S ON S.id_employer = E.id " ; 
        if(is_null ($sector) && is_null($location)){
             $request = $this->pdo->query($sql);
            $request->execute();
        } 
        else{
            $filters = array();
            $sql .= "WHERE ";
            if(!is_null($sector)){
                $sql .= " id_sector = :id_sector";
                array_merge($filters,array('id_sector' => $sector->getId()));
            }
            if(!is_null($location)){
                $sql .= is_null($sector) ? "" : "AND ";
                $sql .= "location = :location";
                array_merge($filters,array('location' => $location->getName()));
            }
            $request = $this->pdo->prepare($sql);
            $request->execute($filters);
        }
        $employers = array();
        while($employer = $request->fetch(PDO::FETCH_OBJ))
            $employers[] = $employer;
        return $employers;
    }

    public function update(Employer $employer){
        # code...
    }

    public function remove(Employer $employer){
        # code...
    }
}
