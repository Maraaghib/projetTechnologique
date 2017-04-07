<?php
   include_once('../model/data/UserBroker.php');

   session_start();
   $account = $_SESSION['account'];

   if (isset($_POST['btnLogIn'])) {
       $login = $_POST['login'];
       $password = $_POST['password'];
   }

   include('../model/signin.php');
   header('Location: ../view/account.php');


?>
