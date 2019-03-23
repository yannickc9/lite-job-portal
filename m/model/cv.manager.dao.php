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
        # code...
    }

    public function getCV(Account $account){
        // return $cv;
    }

    public function remove(CV $cv){
        # code...
    }
}
