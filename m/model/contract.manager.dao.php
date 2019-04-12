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
class ContractManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function getContracts(){
        $request = $this->pdo->query("SELECT * FROM contract");
        $request->execute();
        $contracts = array();
        while ($contract = $request->fetch())
            $Contracts[] = new Contract($contract['id'], $contract['type'],utf8_encode($contract['name']));
        $request->closeCursor();
        return $Contracts;
    }
}
