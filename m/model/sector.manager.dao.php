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
class SectorManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function getSectors(){
        $request = $this->pdo->query("SELECT * FROM sector");
        $request->execute();
        $sectors = array();
        while ($response = $request->fetch())
            $sectors[] = new Sector($response['id'],utf8_encode($response['name']),utf8_encode( $response['description']));
        $request->closeCursor();
        return $sectors;
    }
}
