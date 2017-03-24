<?php

//echo __FILE__.'('.__LINE__.')';

   include_once('../model/data/UserBroker.php');

   session_start();

   $account = $_SESSION['account'];
   var_dump($account);

   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $dateNaiss = $_POST['dateNaiss'];
   $telPerso = $_POST['telPerso'];
   $login = $_POST['login'];
   $password = crypt($_POST['password']);
   $confirmPassword = crypt($_POST['confirmPassword']);

   include('../model/signup.php');
   header('Location: ../view/account.php');

?>
