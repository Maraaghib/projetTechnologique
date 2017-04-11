
<?php

   	include_once('data/User.php');
   	include_once('data/UserBroker.php');
    echo "Je suis sur Model<br>";
   	$isAdded = $account->addUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password);
    echo "Je suis sur Model 2 <br>";

?>
