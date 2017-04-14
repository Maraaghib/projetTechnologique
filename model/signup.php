<?php

   	include_once('data/User.php');
   	include_once('data/Database.php');

	if($user->existUser($email, $login)){
		$isAdded = false;
    }
	else{
		$isAdded = $user->addUser();
    }
?>
