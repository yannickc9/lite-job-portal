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
if (isset($_POST['id_account'])) {
    $id_account = htmlspecialchars($_POST['id_account']);
    if(is_integer($id_account)){
        $cv = new CV(null,$id_account,null,null) ;
        $cv_manager = new CVManager();
        $new_cv_id = $cv_manager->save($cv);
        echo json_encode(array(
            'cv_id' => $new_cv_id
        ));
    }
    else
        // corrupted id_account
        echo -2;
} 
else
    // id_account missing
    echo -1;

