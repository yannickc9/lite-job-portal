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

    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="../index.html">
                        <img class="align-content" src="../images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form id="signin-form">
                        <div class="form-group">
                            <label>Nom complet *</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Prénom Nom Post-nom" required />
                        </div>
                        <div class="form-group">
                            <label>Adresse electronique *</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Adresse électronique" required />
                        </div>
                        <div class="form-group">
                            <label>Mot de passe *</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required />
                        </div>
                        <div class="form-group">
                            <label>Confirmer le mot de passe *</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Mot de passe" required />
                        </div>
                        <div id="passwords-warning" class="register-link m-t-15 d-none">
                            <i class="fa fa-warning mr-2"></i><span>Les mots de passe ne correspondent pas!</span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input id="cbx_terms" type="checkbox" required /> J'accèpte les conditions d'utilisation et règles de confidentialités
                            </label>
                        </div>
                        <input type="submit" id="btn_submit" class="btn btn-primary btn-flat m-b-30 m-t-30" value="S'inscrire" />
                        <div class="register-link m-t-15 text-center">
                            <p>Vous avez déjà un compte ? <a href="../page-login.html"> Connectez-vous ici</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/jquery/dist/jquery.js"></script>
    <script>
        fullname = $('#fullname'), email = $('#email'), password = $('#password'), confirm_password = $('#confirm_password'), btn_submit = $("#btn_submit");
        // $("cbx_terms").change(function (e) {
        //     alert('chane');
        //     e.preventDefault();
        //     btn_submit.removeClass('disabled');
        // });
        btn_submit.click(function(e) {
            e.preventDefault();
            if (password.val() != confirm_password.val())
                $('#passwords-warning').removeClass('d-none');
            else {
                data = "fullname=" + fullname.val() + "&email=" + email.val() + "&password=" + password.val();
                // alert(data);
            // 
            send(data);
            // ).fail(
            // function() {
            // alert(data);
            //             }
            //         )
            }
        });

        function send(data) {
            $.post("test.php", data).done(
                function(response) {
                    alert(response);
                }
            )
        }
    </script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html> 