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

if(isset($_POST['id_account'],$_POST['key'])){
    $key = htmlspecialchars($_POST['key']);
    $account = new Account();
    $account->setAttributes(array('id' => crp::decrypte(htmlspecialchars($_POST['id_account']),$key)));
    $cv_manager = new CVManager();
    $cv = $cv_manager->getCV($account);
    
    // new level
    if(isset($_POST['diploma'],$_POST['domain'])){
        $level = new Level(
            null, 
            $cv->getId(), 
            crp::decrypte(htmlspecialchars($_POST['diploma']),$key), 
            crp::decrypte(htmlspecialchars($_POST['domain']),$key)
        );
        $level_manager = new LevelManager();
        if($formation_manager->add($cv,$level))
            echo 1;    
    }
    // new formation
    else if(isset($_POST['name'],$_POST['institute'],$_POST['document'],$_POST['location'],$_POST['start_date'],$_POST['end_date'])){
        $formation = new Formation(
            null,
            $cv->getId(),
            crp::decrypte(htmlspecialchars($_POST['name']),$key),
            crp::decrypte(htmlspecialchars($_POST['institute']),$key),
            crp::decrypte(htmlspecialchars($_POST['document']),$key),
            crp::decrypte(htmlspecialchars($_POST['location']),$key),
            crp::decrypte(htmlspecialchars($_POST['start_date']),$key),
            crp::decrypte(htmlspecialchars($_POST['end_date']),$key)
        );
        $formation_manager = new FormationManager();
        if($formation_manager->add($cv,$formation))
            echo 1;
    }
    // new experience
    else if(isset($_POST['society'],$_POST['type'],$_POST['description'],$_POST['start_date'],$_POST['end_date'])){
         $experience = new Experience(
            null,
            $cv->getId(),
            crp::decrypte(htmlspecialchars($_POST['society']),$key),
            crp::decrypte(htmlspecialchars($_POST['type']),$key),
            crp::decrypte(htmlspecialchars($_POST['description']),$key),
            crp::decrypte(htmlspecialchars($_POST['start_date']),$key),
            crp::decrypte(htmlspecialchars($_POST['end_date']),$key)
        );
        $experience_manager = new ExperienceManager();
        if($experience_manager->add($cv, $experience))
            echo 1;
    }
    // new skill
    else if(isset($_POST['description'])){
         $skill = new Skill(
            null,
            $cv->getId(),
            crp::decrypte(htmlspecialchars($_POST['description']),$key)
        );
        $skill_manager = new SkillManager();
        if($skill_manager->add($cv, $skill))
            echo 1;
    }
    // new language
    else if(isset($_POST['iso_code'] )){
        $language = new Language(
            null,
            $cv->getId(),
            crp::decrypte(htmlspecialchars($_POST['iso_code']),$key)
        );
        $language_manager = new LanguageManager();
        if($language_manager->add($cv, $language))
            echo 1;
    }
    // new hobby
    else if(isset($_POST['description'] )){
        $hobby = new Hobby(
            null,
            $cv->getId(),
            crp::decrypte(htmlspecialchars($_POST['description']),$key)
        );
        $hobby_manager = new HobbyManager();
        if($hobby_manager->add($cv, $hobby))
            echo 1;
    }
    else
        echo 0;
} else
    // id_account missing
    echo -1;
