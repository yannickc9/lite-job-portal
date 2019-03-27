<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../m/account.class.php');
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
        $account_manager->save($account);
    }
    else
        // the email is used
        echo -2;
}
else
    // fullname,email or password missing
    echo -1;