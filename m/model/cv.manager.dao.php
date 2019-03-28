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
class CVManager extends Manager {
    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function save(CV $cv){
        $request = $this->pdo->prepare('INSERT INTO cv(id_account) VALUES(:id_account)');
        $request->execute(array('id_account' => $cv->getIdAccount()));
        if($request){
            $insert_request = $this->pdo->query('SELECT LAST_INSERT_ID() last_id');
            $insert_request->execute();
            $insert_response = $insert_request->fetch();
            return $insert_response['last_id'];
        }
        return null;
    }

    public function getCV(Account $account){
        // return $cv;
    }

    public function remove(CV $cv){
        # code...
    }
}
