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
       // Faire getUser($login) crée une session 
       $_SESSION['User'] = User::newUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password); // Crée une nouvelle instance de User avec des paramètres
       header('Location: ../view/account/');
   }
   else {
       header('Location: ../view/signin.php?error=true'); // Passer en GET l'/es erreur/s de connexion ???
   }

?>
