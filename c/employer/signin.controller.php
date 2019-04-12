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
require_once('../../m/model/manager.dao.php');
require_once('../../m/model/account.manager.dao.php');

require_once('../../ext/php/crp.php');

if (isset($_POST['id_account'], $_POST['type'], $_POST['password'], $_POST['key'])) {
    $key = htmlspecialchars($_POST['key']);
    $type = crp::decrypte(htmlspecialchars($_POST['type']),$key); 
    $password = crp::decrypte(htmlspecialchars($_POST['password']),$key);
    $account_manager = new AccountManager();
    $account = Account($account_manager->getAccountById(crp::decrypte(htmlspecialchars($_POST['id_account']),$key)));
    if($account->getPassword() == hash('sha256',$password,true)){
        if($account_manager->saveAsEmployer($account,$type))
            echo 1;
        else
            echo 0;
    }
    else
        // incorrect password
        echo -2;
} else
    // fullname,email or password missing
    echo -1;

