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
class DiplomaManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function getDiplomas(){
        $request = $this->pdo->query("SELECT * FROM diploma");
        $request->execute();
        $diplomas = array();
        while ($diploma = $request->fetch())
            $diplomas[] = new Diploma($diploma['id'], utf8_encode( $diploma['designation']), utf8_encode($diploma['description']));
        $request->closeCursor();
        return $diplomas;
    }
}
