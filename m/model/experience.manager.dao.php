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
class ExperienceManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function add(CV $cv, Experience $experience){
        $request = $this->pdo->prepare( 'INSERT INTO experience(id_cv,society,type,description,start_date,end_date) VALUES(:id_cv,:society,:type,:description,:start_date,:end_date)');
        return $request->execute(array(
            'id_cv' => $cv->getId(),
            'society' => $experience->getSociety(),
            'type' => $experience->getSociety(),
            'description' => $experience->getDescription(),
            'start_date' => $experience->getStartDate(),
            'end_date' => $experience->getEndDate()
        ));
    }

    public function update(CV $cv, Experience $experience){
       # code...
    }

    public function remove(CV $cv, Experience $experience){
        # code...
    }
}
