<?php
session_start();
define('PATH', '../');
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
        <?php
        if (isset($_GET['view'])) {
            switch ($_GET['view']) {
                case 'profile':
                    include_once(PATH . 'views/account-profile.php');
                    break;
                case 'notifications':
                    include_once(PATH . 'views/account-notifications.php');
                    break;
                case 'cv':
                    include_once(PATH . 'views/account-cv.php');
                    break;
                case 'jobapplications':
                    include_once(PATH . 'views/account-jobapplications.php');
                    break;
                case 'societies':
                    include_once(PATH . 'views/account-societies.php');
                    break;
                case 'logout':
                    session_destroy();
                    header('Location : ../index.php');
                    break;
                default:
                    include_once(PATH . 'views/account-profile.php');
                    break;
            }
        } else
            include_once(PATH . 'views/account-profile.php');
        ?>
        <!-- Right Panel -->

        <script src="<?php echo PATH; ?>vendors/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo PATH; ?>vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo PATH; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo PATH; ?>assets/js/main.js"></script>


        <script src="<?php echo PATH; ?>vendors/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="<?php echo PATH; ?>assets/js/dashboard.js"></script>
        <script src="<?php echo PATH; ?>assets/js/widgets.js"></script>
        <script src="<?php echo PATH; ?>vendors/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="<?php echo PATH; ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <script src="<?php echo PATH; ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script>
            (function($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>

</body>

</html>