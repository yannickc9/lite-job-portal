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

if (isset($_POST['id_employer'],$_POST['id_sector'],$_POST['name'],$_POST['description'],$_POST['address'],$_POST['location'],$_POST['key'])) {
    $key = htmlspecialchars($_POST['key']);
    $employer = new Employer(crp::decrypte(htmlspecialchars($_POST['id_employer']),$key),null,null);
    $society = new Society();
    $society->setAttributes(array(
        'id_sector' => crp::decrypte(htmlspecialchars($_POST['id_sector']),$key),
        'name' => crp::decrypte(htmlspecialchars($_POST['name']),$key),
        'description' => crp::decrypte(htmlspecialchars($_POST['description']),$key),
        'address' => crp::decrypte(htmlspecialchars($_POST['address']),$key),
        'location' => crp::decrypte(htmlspecialchars($_POST['location']),$key),
        'telephone' => isset($_POST['telephone']) ? crp::decrypte(htmlspecialchars($_POST['telephone']),$key) : null,
        'email' => isset($_POST['email']) ? crp::decrypte(htmlspecialchars($_POST['email']),$key) : null,
        'website' => isset($_POST['website']) ? crp::decrypte(htmlspecialchars($_POST['website']),$key) : null,
        'employees' => isset($_POST['employees']) ? crp::decrypte(htmlspecialchars($_POST['employees']),$key) : null
    ));
    $employer_manager = new EmployerManager();
    if($employer_manager->add($employer,$society))
        echo 1;
    else
        // 
        echo 0;
} 
else
    // something missing
    echo -1;

