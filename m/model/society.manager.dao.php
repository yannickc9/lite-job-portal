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
class SocietyManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function getSocietyById(int $id){
        $request = $this->pdo->prepare('SELECT * FROM society WHERE id = :id');
        $request->execute(array('id_account' => $account->getId()));
        $response = $request->fetch();
        if ($request)
            return new CV($response['id'], $response['id_account'], $response['creation_datetime'], $response['last_update_datetime']);
        return null;
    }

    public function getSocieties($q,Sector $sector,Location $location){
        $sql = "SELECT * FROM society WHERE description LIKE %".$q."% ";
        if(is_null($sector) && is_null($location)){
            $request = $this->pdo->query($sql);
            $request->execute();
        }
        else{
            $filters = array();
            if(!is_null($sector)){
                $sql .= "AND id_sector = :id_sector";
                array_merge($filters,array('id_sector' => $sector->getId()));
            }
            if(!is_null($location)){
                 $sql .= "AND location = :location";
                array_merge($filters,array('location' => $location->getName()));
            }
            $request = $this->pdo->prepare($sql);
            $request->execute($filters);
        }
        $societies = array();
        while($society = $request->fetch(PDO::FETCH_OBJ))
            $societies[] = $society;
        return $societies;
    }

    public function remove(CV $cv){
        # code...
    }
}
