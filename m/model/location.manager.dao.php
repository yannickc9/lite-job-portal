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
class LocationManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }
    
    public function getLocations(){
        $request = $this->pdo->query('SELECT * FROM location');
        $request->execute();
        $locations = array();
        while($response = $request->fetch())
            $locations[] = new Location($response['id'],$response['name']);
        $request->closeCursor();
        return $locations;
    }
}
