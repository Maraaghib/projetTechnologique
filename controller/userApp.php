<?php

	include_once('../model/data/UserBroker.php');

	session_start();

	if (! isset($_SESSION['account'])) {
		$user = new User;
		$config = parse_ini_file('../private/config.ini');
		$error = "";
		$_SESSION['account'] = new UserBroker($user, $config, $error);
	}

	//$_SESSION['biblio'] = new BiblioBroker();

	header('Location: ../view/home.php');

?>
