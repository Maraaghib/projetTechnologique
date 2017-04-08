<?php
   include_once('../model/data/UserBroker.php');

   session_start();
   $account = $_SESSION['account'];

   if (isset($_POST['btnLogIn'])) {
       $login = $_POST['login'];
       $password = $_POST['password'];
   }

   include('../model/signin.php');
   if ($isConnected) {
    //    Rdirect to account
   }
   else {
    //    Redirect to account with type of error message on the URL
   }
   header('Location: ../view/account/');

?>
