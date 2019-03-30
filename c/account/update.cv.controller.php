<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../../db_config/db_params.class.php');
require_once('../../db_config/connection_manager.class.php');
require_once('../../m/structure/builder.interface.php');
require_once('../../m/structure/account.class.php');
require_once('../../m/structure/cv.class.php');
require_once('../../m/model/manager.dao.php');
require_once('../../m/model/cv.manager.dao.php');

require_once('../../ext/php/crp.php');

if(isset($_POST['id_account'],$_POST['key'])){
    $key = htmlspecialchars($_POST['key']);
    $account = new Account();
    $account->setAttributes(array('id' => crp::decrypte(htmlspecialchars($_POST['id_account']),$key)));
    $cv_manager = new CVManager();
    $cv = $cv_manager->getCV($account);
    
    // new level
    if(isset($_POST['diploma'],$_POST['domain'])){
        $level = new Level(
            null, 
            $cv->getId(), 
            crp::decrypte(htmlspecialchars($_POST['diploma']),$key), 
            crp::decrypte(htmlspecialchars($_POST['domain']),$key)
        );
        $level_manager = new LevelManager();
        if($formation_manager->add($cv,$level))
            echo 1;
    }
    else
        echo 0;
} else
    // id_account missing
    echo -1;
