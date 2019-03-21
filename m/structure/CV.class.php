<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CV
 *
 * @author Choni
 */
class CV {
    //put your code here
    private $id;
    private $id_account;
    private $creation_datetime;
    private $last_update_datetime;
    
    public function __construct($id, $id_account, $creation_datetime, $last_update_datetime) {
        $this->id = $id;
        $this->id_account = $id_account;
        $this->creation_datetime = $creation_datetime;
        $this->last_update_datetime = $last_update_datetime;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdAccount() {
        return $this->id_account;
    }

    public function getCreationDatetime() {
        return $this->creation_datetime;
    }

    public function getLastUpdateDatetime() {
        return $this->last_update_datetime;
    }
}