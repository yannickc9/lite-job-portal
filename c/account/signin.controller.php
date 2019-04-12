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

if(isset($_POST['fullname'],$_POST['email'],$_POST['password'],$_POST['key'])){
    $key = htmlspecialchars($_POST['key']);
    $account = new Account();
    $account->setAttributes(array(
        'fullname' => crp::decrypte(htmlspecialchars($_POST['fullname']),$key),
        'email' => crp::decrypte(htmlspecialchars($_POST['email']),$key),
        'password' => crp::decrypte(htmlspecialchars($_POST['password']),$key)
    ));
    $account_manager = new AccountManager();
    if($account_manager->validateEmail($account)){
        $account->createPseudo();
        $new_account_id = $account_manager->save($account);
        echo json_encode(array(
            'id' => $new_account_id,
            'login' => $account->getEmail(),
            'password' => $account->getPassword()
        ));
    }
    else
        // the email is used
        echo -2;
}
else
    // fullname,email or password missing
    echo -1;