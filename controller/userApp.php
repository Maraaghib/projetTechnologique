<?php

	include_once('../model/data/UserBroker.php');

	session_start();

	if (! isset($_SESSION['account'])) {
		$_SESSION['account'] = new UserBroker();
	}

	//$_SESSION['biblio'] = new BiblioBroker();

	header('Location: ../view/home.php');

?>
