<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profession
 *
 * @author Choni
 */
class Profession {
    //put your code here
    private $id;
    private $id_sector;
    private $name;
    private $description;
    
    public function __construct($id, $id_sector, $name, $description) {
        $this->id = $id;
        $this->id_sector = $id_sector;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getId_sector() {
        return $this->id_sector;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }
}
