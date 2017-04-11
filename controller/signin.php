<?php
   include_once('../model/data/UserBroker.php');

   session_start();
   $account = $_SESSION['account'];

   if (isset($_POST['btnLogIn'])) {
       $login = $_POST['login'];
       $password = sha1($_POST['password']); // Hacher le mot depasse
   }

   include('../model/signin.php');
   if ($isConnected) {
       header('Location: ../view/account/');
   }
   else {
       header('Location: ../view/signin.php?error='.$password); // Passer en GET l'/es erreur/s de connexion ???
   }

?>
