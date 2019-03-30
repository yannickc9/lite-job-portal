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
class LevelManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }


    public function add(CV $cv, Level $level){
        $request = $this->pdo->prepare( 'INSERT INTO level(id_cv,diploma,domain) VALUES(:id_cv,:diploma,:domain)');
        return $request->execute(array(
            'id_cv' => $cv->getId(),
            'diploma' => $level->getDiploma(),
            'domain' => $level->getDomain()      
        ));
    }

    public function update(CV $cv, Level $level){
        # code...
    }

    public function remove(CV $cv, Level $level){
        # code...
    }
}
