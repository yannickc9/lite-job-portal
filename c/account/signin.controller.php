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
if(isset($_POST['fullname'],$_POST['email'], $_POST['password'])){
    $account = new Account();
    $account->setAttributes(array(
        'fullname' => htmlspecialchars($_POST['fullname']),
        'email' => htmlspecialchars($_POST['email']),
        'password' => htmlspecialchars($_POST['password']),
    ));
    $account_manager = new AccountManager();
    if($account_manager->validateEmail($account)){
        $account->createPseudo();
        $new_account_id = $account_manager->save($account);
        echo $new_account_id;
    }
    else
        // the email is used
        echo -2;
}
else
    // fullname,email or password missing
    echo -1;