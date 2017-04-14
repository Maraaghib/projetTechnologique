<?php
   include_once('../model/data/Database.php');

   session_start();

   if (isset($_POST['btnLogIn'])) {
       $login = $_POST['login'];
       $password = sha1($_POST['password']); // Hacher le mot depasse
   }

   $user = new User;

   include('../model/signin.php');

   if ($isConnected) {
       // Faire getUser($login) crée une session
       $user->hydrate($user->getUser($login)); // Crée une nouvelle instance de User avec des paramètres

       $_SESSION['User'] = $user;
       header('Location: ../view/account/');
   }
   else {
       header('Location: ../view/signin.php?error=true');
   }

?>
