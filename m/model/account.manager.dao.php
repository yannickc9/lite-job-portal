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
        $request = $this->pdo->prepare('SELECT id FROM account WHERE email = :email');
        $request->execute(array('email' => $account->getEmail()));
        $response = $request->fetch();
        return (is_null($response));
    }

    public function generatePseudo(Account $account){
        $request = $this->pdo->prepare( 'INSERT INTO account(fullname, pseudo, email, password) VALUES(:fullname, :pseudo, :email, :password)');
        return $request->execute(array(
            'fullname' => $account->getFullname(),
            'pseudo' => $account->getPseudo(),
            'email' => $account->getEmail(),
            'password' => $account->getPassword()
        ));
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
