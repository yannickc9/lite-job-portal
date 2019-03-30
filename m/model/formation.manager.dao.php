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
class FormationManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    
    public function add(CV $cv, Formation $formation){
        $request = $this->pdo->prepare( 'INSERT INTO formation(id_cv,name,institute,document,location,start_date,end_date) VALUES(:id_cv,:name,:institute,:document,:location,:start_date,:end_date)');
        $request->execute(array(
            'id_cv' => $cv->getIdAccount(),
            'name' => $formation->getName(),
            'institute' => $formation->getInstitute(),
            'document' => $formation->getDocument(),
            'location' => $formation->getLocation(),
            'start_date' => $formation->getStartDate(),
            'end_date' => $formation->getEndDate()
        ));
    }

    public function remove(CV $cv, Formation $formation){
        # code...
    }
}
