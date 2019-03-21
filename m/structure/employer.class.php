<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employer
 *
 * @author Choni
 */
class Employer {
    //put your code here
    private $id;
    private $id_account;
    private $type;
    
    public function __construct($id, $id_account, $type) {
        $this->id = $id;
        $this->id_account = $id_account;
        $this->type = $type;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getIdAccount() {
        return $this->id_account;
    }

    public function getType() {
        return $this->type;
    }



}
