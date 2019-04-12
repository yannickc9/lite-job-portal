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
    // protected static HOST = "localhost";
    // private const DBNAME = "jobportal";
    // private const USER = "root";
    // private const PASS = "";
    
    public function __construct() {
        $this->pdo = ConnectionManager::getConnection();
    }
}
