<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=431, height=device-height, initial-scale=1">
        <title>Plateforme des séniors | Accueil</title>
    	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
    	<link rel="stylesheet" type="text/css" href="dist/css/myStyle.css"/>
        <style media="screen">

        </style>
    </head>
    <body>
        <div class="container navigation">
            <div class="row navigation">
               <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="home.php">
                                <img src="img/logo.jpg" alt="Logo de la mairie de Bègles" class="logo">
                            </a>
                        </div>
                        <ul class="nav navbar-nav">
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="signin.php" class="btn btn-default navbar-btn" id="cacher">Se connecter</a></li>
                            <li><a href="signup.php" class="btn btn-default navbar-btn" id="cacher">S'inscrire</a></li>
                            <li><a href="signup.php" class="btn btn-default navbar-btn">Devenir bénévole</a><li>
                        </ul>
                    </div>
               </nav>
           </div> <!-- row navigation -->
        </div> <!-- container navigation -->

        <div class="container header">
            <div class="page-header text-center">
                <h1>Bienvenue sur la page d'accès aux services de la Mairie de Bègles</h1>
            </div>
        </div> <!-- container header -->

        <div class="container content">
            <form class="form-horizontal" id="homeForm" action="#" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dropdown text-right">
                            <a href="signin.php" class="btn btn-default btn-lg large-btn" id="signin" name="signin"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="dropdown text-left">
                            <a href="signup.php" class="btn btn-default btn-lg large-btn" id="signup" name="signup"><span class="glyphicon glyphicon-user"></span> Inscription</a>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- container content -->

        <div class="container footer">

        </div> <!-- container footer -->

        <script type="text/javascript" src="dist/js/myScript.js"></script>
        <script type="text/javascript" src="dist/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    </body>
</html>
