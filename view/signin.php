<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TD1 - Projet Technologique</title>
    	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />

    </head>
    <body>
        <form class="form" action="../controller/signin.php" method="post">
            <label for="">Login:</label>
            <input type="text" id="login" name="login" placeholder="Donner votre login" required><br><br>
            <label for="">Mot de passe:</label>
            <input type="password" id="password" name="password" placeholder="**************" required><br><br>
            <button type="submit" name="connexion">Connexion</button>
        </form>

        <script type="text/javascript" src="dist/js/myScript.js"></script>
        <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dist/js/jquery-3.2.0.min.js"></script>
    </body>
</html>
