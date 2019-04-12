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

    public function getExperienceDurations(){
        $request = $this->pdo->prepare('SELECT * FROM experience_duration');
        $request->execute();
        $experience_durations = array();
        while($e = $request->fetch())
            $experience_durations[] = new ExperienceDuration($e['id'],$e['duration'],utf8_encode($e['label']));
        $request->closeCursor();
        return $experience_durations;
    }

    public function add(CV $cv, Experience $experience){
        $this->pdo->beginTransaction();
        $request = $this->pdo->prepare( 'INSERT INTO experience(id_cv,society,type,description,start_date,end_date) VALUES(:id_cv,:society,:type,:description,:start_date,:end_date)');
        $request->execute(array(
            'id_cv' => $cv->getId(),
            'society' => $experience->getSociety(),
            'type' => $experience->getSociety(),
            'description' => $experience->getDescription(),
            'start_date' => $experience->getStartDate(),
            'end_date' => $experience->getEndDate()
        ));
        $request = $this->pdo->prepare('UPDATE cv SET last_update_datetime = NOW() WHERE id_account = :id_account');
        $request->execute(array(
            'id_account' => $cv->getIdAccount()
        ));
        if(!$this->pdo->commit())
            return !$this->pdo->rollBack();
        return true;
    }

    public function update(CV $cv, Experience $experience){
       # code...
    }

    public function remove(CV $cv, Experience $experience){
        # code...
    }
}
