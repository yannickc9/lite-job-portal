<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require_once('../m/account.class.php');
require_once('../m/account.manager.dao.php');

require_once('../../ext/php/crp.php');

if (isset($_POST['login'],$_POST['password'],$_POST['key'])) {
    $key = htmlspecialchars($_POST['key']);
    $account = new Account();
    $account->setAttributes(array(
        'email' => crp::decrypte(htmlspecialchars($_POST['login']),$key),
        'password' => crp::decrypte(htmlspecialchars($_POST['password']),$key)
   ));
    $account_manager = new AccountManager();
    $session = $account_manager->connect($account);
    if (!is_null($session)){
        // initialize the session
        $_SESSION['key'] = time();
        $_SESSION['location'] = crp::crypte($session['location'],$_SESSION['key']);
        $_SESSION['fullname'] = crp::crypte($session['fullname'],$_SESSION['key']);
        $_SESSION['pseudo'] = crp::crypte($session['pseudo'],$_SESSION['key']);
        $_SESSION['bio'] = crp::crypte($session['bio'],$_SESSION['key']);
        $_SESSION['telephone'] = crp::crypte($session['telephone'],$_SESSION['key']);
        $_SESSION['email'] = crp::crypte($session['email'],$_SESSION['key']);
        $_SESSION['password'] = crp::crypte($session['password'],$_SESSION['key']);
        $_SESSION['address'] = crp::crypte($session['address'],$_SESSION['key']);
        $_SESSION['nationality'] = crp::crypte($session['nationality'],$_SESSION['key']);
        $_SESSION['birthday'] = crp::crypte($session['birthday'],$_SESSION['key']);
        $_SESSION['birthplace'] = crp::crypte($session['birthplace'],$_SESSION['key']);
        $_SESSION['birthplace'] = crp::crypte($session['birthplace'],$_SESSION['key']);
        $_SESSION['location'] = crp::crypte($session['location'],$_SESSION['key']);

        // save data in cookies if in connected mode
        if(isset($_POST['connection'])){
            setcookie('key',$_SESSION['key'],time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
            setcookie('account_id',crp::crypte($session['id'],$_SESSION['key']),time()+24*3600);
        }
        echo 1;
    } 
    else
        // email and password don't match 
        echo -2;
}
else
    // email or password missing
    echo -1;

