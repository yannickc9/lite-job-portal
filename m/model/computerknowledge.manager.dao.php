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
class ComputerKnowledgeManager extends Manager{
    //put your code here
    public function __construct(){
        parent::__construct();
    }

    public function add(CV $cv, ComputerKnowledge $computer_knowledge){
        $this->pdo->beginTransaction();
        $request = $this->pdo->prepare('INSERT INTO computer_knowledge(id_cv,type,knowledge) VALUES(:id_cv,:type,:knowledge)');
        $request->execute(array(
            'id_cv' => $cv->getId(),
            'type' => $computer_knowledge->getType(),
            'knowledge' => $computer_knowledge->getKnowledge()
        ));
        $request = $this->pdo->prepare('UPDATE cv SET last_update_datetime = NOW() WHERE id_account = :id_account');
        $request->execute(array(
            'id_account' => $cv->getIdAccount()
        ));
        if(!$this->pdo->commit())
            return !$this->pdo->rollBack();
        return true;
    }

    public function remove(CV $cv, ComputerKnowledge $computer_knowledge){
        # code...
    }
}
