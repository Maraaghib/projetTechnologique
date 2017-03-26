<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TD1 - Projet Technologique</title>
    	<link rel="stylesheet" type="text/css" href="dist/css/myStyle.css"/>
    	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
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
            <div class="page-header">
                <h1>Inscription à la plateforme de la Mairie</h1>
            </div>
        </div> <!-- container header -->

        <div class="container content">
            <form class="form-horizontal" action="../controller/signup.php" method="post">
                <div class="form-group form-group-lg">
                    <label for="" class="control-label label-lg">Prénom:</label>
                    <input type="text" class="form-control" name="prenom" value="" placeholder="Entrer votre prénom" required>
                </div>
                <div class="form-group form-group-lg">
                    <label for="" class="control-label control-label-lg">Nom:</label>
                    <input type="text" class="form-control" name="nom" value="" placeholder="Entrer votre nom" required>
                </div>
                <div class="form-group form-group-lg">
                    <label for="" class="control-label label-lg">E-mail:</label>
                    <input type="email" class="form-control" name="email" value="" placeholder="Entrer votre e-mail" required>
                </div>
                <div class="form-group form-group-lg">
                    <label for="" class="control-label label-lg">Date de naissance:</label>
                    <input type="date" class="form-control" name="dateNaiss" value="" required>
                </div>
                <div class="form-group form-group-lg" id="telPersoDiv">
                    <label for="" class="control-label label-lg">Téléphone:</label>
                    <input type="num" class="form-control" id="telPerso" name="telPerso" onblur="inputValidation('tel')" placeholder="Numéro de téléphone" required>
                    <span class="help-block" id="helpTel"></span>
                </div>
                <div class="form-group form-group-lg">
                    <label for="" class="control-label label-lg">Identifiant:</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Donner votre login" required>
                </div>
                <div class="form-group form-group-lg">
                    <label for="" class="control-label label-lg">Mot de passe:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="**************" required>
                </div>
                <div class="form-group form-group-lg" id="confirmPasswordDiv">
                    <label for="" class="control-label label-lg">Confirmation du mot de passe:</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onblur="inputValidation('confirmPassword')"  placeholder="**************">
                    <span class="help-block" id="helpConfirmPassword"></span>
                </div>
                <div class="form-group form-group-lg">
                    <div class="col-sm-offset-2 ">
                        <center><button type="submit" class="btn btn-default btn-lg" name="inscription" >Inscription</button></center>
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
