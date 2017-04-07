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
                <h1>Connexion à la plateforme de la Mairie</h1>
            </div>
        </div> <!-- container header -->

        <div class="container content">
            <form class="form-horizontal" action="../controller/signin.php" method="post">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10">
                        <div class="imgcontainer">
                            <img src="img/avatars/img_avatar1.png" class="avatar" alt="Avatar">
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label label-lg">Identifiant</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Entrer votre identifiant" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <label id="label-lg" for="" class="control-label control-label-lg">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="**************" required>
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="">
                                <center><button type="submit" class="btn btn-default btn-lg" id="btnLogIn" name="btnLogIn"><span class="glyphicon glyphicon-log-in"></span> Connexion</button></center>
                            </div>
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
        <script type="text/javascript">

        </script>
    </body>
</html>
