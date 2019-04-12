<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of computer-knowledge
 *
 * @author Choni
 */
class ComputerKnowledge {
//put your code here
    private $id;
    private $id_cv;
    private $type;
    private $knowledge;

    public const TYPES = array(
        "L" => "Language de programmation",
        "S" => "Logiciel",
        "N" => "Configuration de matériel réseau",
        "D" => "Administration de base de données",
        "A" => "Administration systèmes",
        "O" => "Système d'exploitation"
    );

    public function __construct($id, $id_cv, $type, $knowledge) {
        $this->id = $id;
        $this->id_cv = $id_cv;
        $this->type = $type;
        $this->knowledge = $knowledge;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCv() {
        return $this->id_cv;
    }

    public function getType() {
        return $this->type;
    }

    public function getKnowledge() {
        return $this->knowledge;
    }
}
