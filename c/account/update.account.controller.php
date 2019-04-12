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

if (isset($_POST['id_account'],$_POST['key'])){
    $key = htmlspecialchars($_POST['key']);
    $id = crp::decrypte(htmlspecialchars($_POST['id_account']),$key);
    $fullname = isset($_POST['fullname']) ? crp::decrypte(htmlspecialchars($_POST['fullname']),$key) : null;
    $pseudo = isset($_POST['pseudo']) ? crp::decrypte(htmlspecialchars($_POST['pseudo']),$key) : null;
    $bio = isset($_POST['bio']) ? crp::decrypte(htmlspecialchars($_POST['bio']),$key)  : null;
    $telephone = isset($_POST['telephone']) ? crp::decrypte(htmlspecialchars($_POST['telephone']),$key)  : null;
    $address = isset($_POST['address']) ? crp::decrypte(htmlspecialchars($_POST['address']),$key)  : null;
    $nationality = isset($_POST['nationality']) ? crp::decrypte(htmlspecialchars($_POST['nationality']),$key)  : null;
    $birthday = isset($_POST['birthday']) ? crp::decrypte(htmlspecialchars($_POST['birthday']),$key)  : null;
    $birthplace = isset($_POST['birthplace']) ? crp::decrypte(htmlspecialchars($_POST['birthplace']),$key)  : null;
    $location = isset($_POST['location']) ? crp::decrypte(htmlspecialchars($_POST['location']),$key)  : null;

    $account = new Account();
    $account->setAttributes(array(
        'id' => $id,
        'fullname' => $fullname,
        'pseudo' => $pseudo,
        'bio' => $bio,
        'telephone' => $telephone,
        'address' => $address,
        'nationality' => $nationality,
        'birthday' => $birthday,
        'birthplace' => $birthplace,
        'location' => $location
    ));
    $account_manager = new AccountManager();
    $account_manager->update($account);
} else
    // id_account missing
    echo -1;
