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

    public function getAccountById($account_id){
        $request = $this->pdo->prepare('SELECT * FROM account WHERE id = :id');
        $request->execute(array('id' => $account_id));
        $response = $request->fetch();
        if(is_null( $response))
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
        $sql = 'UPDATE account SET ';
        $sql .= (!is_null($account->getFullname())) ? 'fullname = :fullname' : '';
        $sql .= (!is_null($account->getPseudo())) ? 'pseudo = :pseudo' : '';
        $sql .= (!is_null($account->getBio())) ? 'bio = :bio' : '';
        $sql .= (!is_null($account->getTelephone())) ? 'telephone = :telephone' : '';
        $sql .= (!is_null($account->getEmail())) ? 'email = :email' : '';
        $sql .= (!is_null($account->getAddress())) ? 'address = :address' : '';
        $sql .= (!is_null($account->getNationality())) ? 'nationality = :nationality' : '';
        $sql .= (!is_null($account->getBirthday())) ? 'birthday = :birthday' : '';
        $sql .= (!is_null($account->getBirthplace())) ? 'birthplace = :birthplace' : '';
        $sql .= (!is_null($account->getLocation())) ? 'location = :location' : '';
        $sql .= 'WHERE id = :id';
        
        $request = $this->pdo->prepare($sql);
        $request->execute(array(
            'id' => $account->getId(),
            'fullname' => $account->getFullname(),
            'pseudo' => $account->getPseudo(),
            'bio' => $account->getBio(),
            'telephone' => $account->getTelephone(),
            'email' => $account->getEmail(),
            'address' => $account->getAddress(),
            'nationality' => $account->getNationality(),
            'birthday' => $account->getBirthday(),
            'birthplace' => $account->getBirthplace(),
            'location' => $account->getLocation()
        ));
    }
}
