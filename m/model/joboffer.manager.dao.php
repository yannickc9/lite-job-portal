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
        $request = $this->pdo->prepare( 'INSERT INTO 
            job_offer(id_employer,id_society,id_profession,description,genre,type,min_experience,salary,level,duration,duration_unit,location) 
            VALUES(:id_employer,:id_society,:id_profession,:description,:genre,:type,:min_experience,:salary,:level,:duration,:duration_unit,:location)');
        return $request->execute(array(
            'id_employer' => $job_offer->getIdEmployer(),
            'id_society' => $job_offer->getIdSociety(),
            'id_profession' => $job_offer->getIdProfession(),
            'description' => $job_offer->getDescription(),
            'genre' => $job_offer->getGenre(),
            'type' => $job_offer->getContractType(),
            'min_experience' => $job_offer->getMinExperience(),
            'salary' => $job_offer->getSalary(),
            'level' => $job_offer->getStudiesLevel(),
            'duration' => $job_offer->getDuration(),
            'duration_unit' => $job_offer->getDurationUnit(),
            'location' => $job_offer->getLocation()
        ));
    }

    public function getJobOffers($q,Sector $sector = null, Profession $profession = null, Location $location = null, Contract $contract = null, ExperienceDuration $experience = null, Level $level = null){
        $sql = "SELECT JO.* FROM job_offer JO INNER JOIN profession P ON JO.id_profession = P.id WHERE JO.description LIKE '%'";
        if(is_null($q) && is_null($sector) && is_null($profession) && is_null($location) && is_null($contract) && is_null($experience) && is_null($level)){
            $request = $this->pdo->query($sql);
            $request->execute();
        }
        else{
            if(!is_null($q)){
                $sql = "SELECT JO.* FROM job_offer JO INNER JOIN profession P ON JO.id_profession = P.id WHERE JO.description LIKE '%'.$q.'%'";
            }
            $filters = array();
            if(!is_null($sector)){
                $sql .= "AND P.id_sector = :id_sector";
                $filters = array_merge($filters,array('id_sector' => $sector->getId())); 
            }
            if(!is_null($profession)){
                $sql .= "AND JO.id_profession = :id_profession";
                $filters = array_merge($filters,array('id_profession' => $profession->getId()));
            }
            if(!is_null($location)){
                $sql .= "AND JO.location = :location";
                $filters = array_merge($filters,array('location' => $location));
            }
            if(!is_null($contract)){
                $sql .= "AND JO.type = :type";
                $filters = array_merge($filters,array('type' => $contract->getType()));
            }
            if(!is_null($experience)){
                $sql .= "AND JO.min_experience = :min_experience";
                $filters = array_merge($filters,array('min_experience' => $experience));
            }
            if(!is_null($level)){
                $sql .= "AND level = :level";
                $filters = array_merge($filters,array('level' => $level));
            }
            $request = $this->pdo->prepare($sql);
            $request->execute($filters);
            // var_dump($sql,$request, $filters);
        }
        $job_offers = array();
        while($response = $request->fetch(PDO::FETCH_OBJ))
            $job_offers[] = $response;
        return $job_offers;
    }

    public function update(JobOffer $job_offer){
        # code...
    }

    public function remove(JobOffer $job_offer){
        # code...
    }
}
