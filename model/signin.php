
<?php

   	include_once('data/User.php');
   	include_once('data/UserBroker.php');

   	echo "MODEL : Avant la ligne: user = account->connectUser(login, password);!<br>";

   	/*$testUser = new User;
   	$testUser->nom = "NOMTEST";
   	$testUser->prenom = "PRENOMTEST";
   	$testUser->login = "jortest";
   	$testUser->password = "yo";

   	$testBroker = new UserBroker;
   	$testBroker->userOnline = $testUser;*/
   	$isConnected = $account->connectUser($login, $password);

   	echo "MODEL : Après la ligne: user = account->connectUser(login, password);!<br>";
?>
