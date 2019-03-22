<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manager
 *
 * @author Choni
 */
abstract class Manager {
    //put your code here
    protected $pdo;
    
    public function __construct() {
        $this->pdo = ConnectionManager::getConnection();
    }
}
