<?php
define('PATH', '../../');
require_once(PATH . 'db_config/db_params.class.php');
require_once(PATH . 'db_config/connection_manager.class.php');
require_once(PATH . 'm/model/manager.dao.php');
spl_autoload_register(function ($model) {
    $class = strtolower(substr($model, 0, strpos($model, "Manager")));
    $class = (strlen($class) > 1) ? $class . "." : "";
    require_once(PATH . 'm/model/' . $class . 'manager.dao.php');
});
spl_autoload_register(function ($structure) {
    $class = strtolower($structure) . ".";
    require_once(PATH . 'm/structure/' . $class . 'class.php');
});
$sector_manager = new SectorManager();
$profession_manager = new ProfessionManager();
$location_manager = new LocationManager();
$contract_manager = new ContractManager();
$experience_manager = new ExperienceManager();
$diploma_manager = new DiplomaManager();
$job_offer_manager = new JobOfferManager();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo PATH; ?>apple-icon.png">
    <link rel="shortcut icon" href="<?php echo PATH; ?>favicon.ico">


    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?php echo PATH; ?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?php echo PATH; ?>index.html">
                        <img class="align-content" src="<?php echo PATH; ?>images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="signin-form">
                        <div class="form-group">
                            <label for="profession">Profession *</label>
                            <select id="profession" name="profession" class="form-control">
                            <?php
                            $sectors = $sector_manager->getSectors();
                            $professions = $profession_manager->getProfessions();
                            foreach ($sectors as $sector) {
                                ?>
                                <optgroup label="<?php echo $sector->getName(); ?>">
                                    <?php
                                    foreach ($professions as $profession) {
                                        if ($profession->getIdSector() == $sector->getId()) {
                                            ?>
                                            <option value="<?php echo $profession->getId(); ?>"><?php echo $profession->getName(); ?>
                                            </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </optgroup>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contract">Adresse electronique *</label>
                            <select id="contract" name="contract" class="form-control">
                            <?php
                            $contracts = $contract_manager->getContracts();
                            foreach ($contracts as $contract) {
                                ?>
                                <option value="<?php echo $contract->getId(); ?>"><?php echo $contract->getType() . ' - ' . $contract->getName(); ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Déscription *</label>
                            <textarea type="description" id="description" name="description" class="form-control" placeholder="Décrivez ce que vous voulez..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="duration">Durée</label>
                            <input type="number" id="duration" name="duration" class="form-control" placeholder="Durée" required />
                        </div>
                        <div class="form-group">
                            <label for="duration">Unité de temps</label>
                            <select id="duration" name="duration" class="form-control">
                                <option value="M">Mois</option>
                                <option value="Y">Année</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="experience">Expérience professionnelle</label>
                            <select id="contract" name="contract" class="form-control" required>
                            <?php
                            $experience_durations = $experience_manager->getExperienceDurations();
                            foreach ($experience_durations as $experience) {
                                ?>
                                <option value="<?php echo $experience->getDuration(); ?>"><?php echo $experience->getLabel(); ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="min_salary">Salaire minimum</label>
                            <input type="number" id="min_salary" name="min_salary" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="location">Localisation</label>
                            <select id="location" name="location" class="form-control">
                            <?php
                            $locations = $location_manager->getLocations();
                            foreach ($locations as $location) {
                                ?>
                                <option value="<?php echo $location->getId(); ?>"><?php echo $location->getName(); ?>
                                </option>
                                <?php
                            }
                            ?>
                            </select>
                        </div>
                        <input type="submit" id="btn_submit" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Poster la demande" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo PATH; ?>vendors/jquery/dist/jquery.js"></script>
    <script src="<?php echo PATH; ?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo PATH; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo PATH; ?>assets/js/main.js"></script>

</body>

</html>