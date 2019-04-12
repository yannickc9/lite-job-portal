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
class ProfessionManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function getProfessions(){
        $request = $this->pdo->query("SELECT * FROM profession");
        $request->execute();
        $professions = array();
        while ($profession = $request->fetch())
            $professions[] = new Profession($profession['id'], $profession['id_sector'], utf8_encode($profession['name']), utf8_encode( $profession['description']));
        $request->closeCursor();
        return $professions;
    }

    public function getProfessionsBySector(){
        $request = $this->pdo->query( "SELECT P.id,S.id id_sector,P.name,P.description,S.name sector_name,S.description sector_description FROM profession P INNER JOIN sector S ON P.id_sector = S.id");
        $request->execute();
        $professions = array();
        while ($profession = $request->fetch())
            $professions[] = array(new Profession($profession['id'],$profession['id_sector'],utf8_encode($profession['name']),utf8_encode($profession['description'])),
                                    new Sector($profession['id_sector'],utf8_encode($profession['sector_name']),utf8_encode($profession['sector_description'])));
        $request->closeCursor();
        return $professions;
    }
}
