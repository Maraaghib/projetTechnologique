
<?php

   	include_once('data/User.php');
   	include_once('data/UserBroker.php');
   	$isAdded = $account->addUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password);

?>
