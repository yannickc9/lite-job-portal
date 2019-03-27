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
        return (is_null($response['id']));
    }

    public function generatePseudo(Account $account){
        
    }

    public function save(Account $account){
        $request = $this->pdo->prepare('INSERT INTO account(fullname, pseudo, email, password) VALUES(:fullname, :pseudo, :email, :password)');
        $request->execute(array(
            'fullname' => $account->getFullname(),
            'pseudo' => $account->getPseudo(),
            'email' => $account->getEmail(),
            'password' => hash('sha256', $account->getPassword(),true)
        ));
        if($request){
            $insert_request = $this->pdo->query('SELECT LAST_INSERT_ID() AS last_id');
            $insert_request->execute();
            $insert_response = $insert_request->fetch();
            return $insert_response['last_id'];
        }
        return 0;
    }

    public function getAccounts(Sector $sector,Profession $profession,Location $location,Contract $contract,Experience $experience,Level $level){
        
    }

    public function connect(Account $account){
        $request = $this->pdo->prepare('SELECT * FROM account WHERE (email = :email AND password = :password');
        $request->execute(array(
            'email' => $account->getEmail(),
            'password' => hash('sha256', $account->getPassword(),true)
        ));
        $response = $request->fetch();
        if(is_null($response))
            return null;
        else
            return json_encode(array(
                'id' => $response['id'],
                'fullname' => $response['fullname'],
                'pseudo' => $response['pseudo'],
                'bio' => $response['bio'],
                'telephone' => $response['telephone'],
                'email' => $response['email'],
                'password' => $response['password'],
                'address' => $response['address'],
                'nationality' => $response['nationality'],
                'birthday' => $response['birthday'],
                'birthplace' => $response['birthplace'],
                'location' => $response['location']
            ));
    }

    public function update(Account $account){
        
    }
}
