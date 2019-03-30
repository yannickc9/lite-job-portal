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
class HobbyManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function add(CV $cv, Hobby $hobby){
        $this->pdo->beginTransaction();
        $request = $this->pdo->prepare('INSERT INTO hobby(id_cv,description) VALUES(:id_cv,:description)');
        $request->execute(array(
            'id_cv' => $cv->getIdAccount(),
            'description' => $hobby->getDescription()
        ));
        $request = $this->pdo->prepare('UPDATE cv SET last_update_datetime = NOW() WHERE id_account = :id_account');
        $request->execute(array(
            'id_account' => $cv->getIdAccount()
        ));
        if(!$this->pdo->commit())
            return !$this->pdo->rollBack();
        return true;
    }

    public function update(CV $cv, Hobby $hobby){
     
       # code...
    }

    public function remove(CV $cv, Hobby $hobby){
        # code...
    }
}
