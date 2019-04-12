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

if (isset($_POST['id_job_application'],$_POST['key'])) {
    $key = htmlspecialchars($_POST['key']);
    $updated_job_application = new JobApplication();
    $job_application->setAttributes(array(
        'id_account' => crp::decrypte(htmlspecialchars($_POST['id_account']), $key),
        'id_profession' => crp::decrypte(htmlspecialchars($_POST['id_profession']), $key),
        'type' => crp::decrypte(htmlspecialchars($_POST['type']), $key),
        'description' => crp::decrypte(htmlspecialchars($_POST['description']), $key),
        'duration' => crp::decrypte(htmlspecialchars($_POST['duration']), $key),
        'duration_unit' => crp::decrypte(htmlspecialchars($_POST['duration_unit']), $key),
        'experience' => crp::decrypte(htmlspecialchars($_POST['experience']), $key),
        'min_salary' => crp::decrypte(htmlspecialchars($_POST['min_salary']), $key),
        'location' => crp::decrypte(htmlspecialchars($_POST['location']), $key)
    ));
    $job_application_manager = new JobApplicationManager();
    if ($job_application_manager->save($job_application))
        echo 1;
    else
        // the email is used
        echo -2;
} else
    // fullname,email or password missing
    echo -1;
