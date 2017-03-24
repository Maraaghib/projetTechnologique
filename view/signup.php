<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TD1 - Projet Technologique</title>
    </head>
    <body>
        <form class="form" action="../controller/signup.php" method="post">
            <label for="">Nom:</label>
            <input type="text" name="nom" value="" placeholder="Entrer votre nom" required><br><br>
            <label for="">Prénom:</label>
            <input type="text" name="prenom" value="" placeholder="Entrer votre prénom" required><br><br>
            <label for="">Email:</label>
            <input type="email" name="email" value="" placeholder="Entrer votre email" required><br><br>
            <label for="">Date de naissance</label>
            <input type="date" name="dateNaiss" value="" placeholder="dd/mm/yyyy" required><br><br>
            <label for="">Téléphone:</label>
            <input type="tel" id="telPerso" name="telPerso" value="" placeholder="Numéro de téléphone" required><br><br>
            <label for="">Login:</label>
            <input type="text" id="login" name="login" placeholder="Donner votre login" required><br><br>
            <label for="">Mot de passe:</label>
            <input type="password" id="password" name="password" placeholder="**************" required><br><br>
            <label for="">Confirmation du mot de passe:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="**************"><br><br>
            <button type="submit" name="inscription">Inscription</button>
        </form>

        <script type="text/javascript" src="js/myScript.js"></script>
    </body>
</html>
