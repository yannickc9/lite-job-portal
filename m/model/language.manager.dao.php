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
class LanguageManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function add(CV $cv, Language $language){
        $this->pdo->beginTransaction();
        $request = $this->pdo->prepare('INSERT INTO language(id_cv,iso_code) VALUES(:id_cv,:iso_code)');
        $request->execute(array(
            'id_cv' => $cv->getId(),
            'iso_code' => $language->getIsoCode()
        ));
        $request = $this->pdo->prepare('UPDATE cv SET last_update_datetime = NOW() WHERE id_account = :id_account');
        $request->execute(array(
            'id_account' => $cv->getIdAccount()
        ));
        if(!$this->pdo->commit())
            return !$this->pdo->rollBack();
        return true;
    }

    public function remove(CV $cv, Language $language){
        # code...
    }
}
