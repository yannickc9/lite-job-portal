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

if(isset($_POST['id_employer'],$_POST['id_profession'],$_POST['description'],$_POST['type'],$_POST['min_experience'],$_POST['salary'],$_POST['level'],$_POST['duration'],$_POST['duration_unit'],$_POST['key'])) {
    $key = htmlspecialchars($_POST['key']);
    $employer = new Employer(crp::decrypte(htmlspecialchars($_POST['id_employer']), $key),null,null);
    $society = new Society();
    $society->setAttributes(array(
        'id' => isset($_POST['id_society']) ? crp::decrypte(htmlspecialchars($_POST['id_society']),$key) : null
    ));
    $job_offer = new JobOffer();
    $job_offer->setAttributes(array(
        'id_employer' => $employer->getId(),
        'id_society' => $society->getId(),
        'id_profession' => crp::decrypte(htmlspecialchars($_POST['id_profession']),$key),
        'description' => crp::decrypte(htmlspecialchars($_POST['description']),$key),
        'genre' => isset($_POST['genre']) ? crp::decrypte(htmlspecialchars($_POST['genre']),$key) : "MF",
        'type' => crp::decrypte(htmlspecialchars($_POST['type']),$key),
        'min_experience' => crp::decrypte(htmlspecialchars($_POST['min_experience']),$key),
        'salary' => crp::decrypte(htmlspecialchars($_POST['salary']),$key),
        'level' => crp::decrypte(htmlspecialchars($_POST['level']),$key),
        'duration' => crp::decrypte(htmlspecialchars($_POST['duration']),$key),
        'duration_unit' => crp::decrypte(htmlspecialchars($_POST['duration_unit']),$key),
        'location' => crp::decrypte(htmlspecialchars($_POST['location']),$key)
    ));
    $job_offer_manager = new JobOfferManager();
    if ($job_offer_manager->save($job_offer))
        echo 1;
    else
        // error during execution
        echo 0;
}
else
    // something missing
    echo -1;
