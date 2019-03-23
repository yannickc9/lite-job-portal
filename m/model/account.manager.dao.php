<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Choni
 */
class AccountManager extends Manager {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function validateEmail(Account $account){

    }

    public function generatePseudo(Account $account){

    }

    public function save(Account $account){
        
    }

    public function getAccounts(Sector $sector,Profession $profession,Location $location,Contract $contract,Experience $experience,Level $level){
        
    }

    public function connect(Account $account){
        
    }

    public function update(Account $account){
        
    }
}
