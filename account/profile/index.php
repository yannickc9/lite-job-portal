<?php
session_start();
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
$location_manager = new LocationManager();
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
    <link rel="stylesheet" href="<?php echo PATH; ?>vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="<?php echo PATH; ?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->

    <?php
    include_once(PATH . '/views/account-menu.php');
    ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Mon profil</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-sm-6 p-2">
                <form class="login-form">
                    <div class="form-group">
                        <label for="fullname">Nom complet *</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nom complet">
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Votre mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea type="text" id="bio" name="bio" class="form-control" placeholder="Dites quelque chose sur vous"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse électronique</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre adresse électronique">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="telephone" id="telephone" name="telephone" class="form-control" placeholder="Votre numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <label for="nationality">Pays d'origine</label>
                        <select id="" name="" class="form-control" required>
                            <option value="CD" selected>Rép. Dém. du Congo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Localisation</label>
                        <select id="location" name="location" class="form-control" required>
                            <?php
                            $locations = $location_manager->getLocations();
                            foreach ($locations as $location) {
                                ?>
                                <option value="<?php echo $location->getId(); ?>"><?php echo $location->getName(); ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Votre adresse">
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>