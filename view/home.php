<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=431, height=device-height, initial-scale=1">
        <title>TD1 - Projet Technologique</title>
    	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
    	<link rel="stylesheet" type="text/css" href="dist/css/myStyle.css"/>
        <style media="screen">

        </style>
    </head>
    <body>
        <div class="container navigation">
            <div class="row navigation">
               <nav class="navbar navbar-default navbar-fixed-top">
                   <ol class="breadcrumb">
                       <li><a href="#"><img class="logo"></a></li> <!-- On peut ajouter l'image via le background du CSS -->
                   </ol>
                   <div class="navbar-collapse collapse navbar-right">
                       <ul class="nav navbar-nav">

                       </ul>
                   </div>
               </nav>
           </div> <!-- row navigation -->
        </div> <!-- container navigation -->

        <div class="container header">
            <div class="page-header text-center">
                <h1>Bienvenue sur la plateforme de la Mairie</h1>
            </div>
        </div> <!-- container header -->

        <div class="container content">
            <form class="form-horizontal" id="homeForm" action="#" method="post">
                <div class="row">
                    <div class="form-group form-group-lg">
                        <div class="">
                            <center><button type="submit" class="btn btn-default btn-lg" id="signin" name="signin" onclick="actionForm('signin.php')"><span class="glyphicon glyphicon-log-in"></span> Connexion</button></center>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <div class="">
                            <center><button type="submit" class="btn btn-default btn-lg" id="signup" name="signup" onclick="actionForm('signup.php')"><span class="glyphicon glyphicon-user"></span> Inscription</button></center>
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
