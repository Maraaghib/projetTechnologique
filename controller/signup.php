<?php

    include_once('../model/data/Database.php');

    session_start();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaiss = $_POST['dateNaiss'];
    $telPerso = $_POST['telPerso'];
    $login = $_POST['login'];
    $password = sha1($_POST['password']);
    $avatar = $_POST['avatar'];

    $user = User::newUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password, $avatar); // Crée une nouvelle instance de User avec des paramètres

    include('../model/signup.php');

    if ($isAdded) {
        $user->hydrate($user->getUser($login));
        $_SESSION['User'] = $user;

        header('Location: ../view/account/');
    }
    else {
        // Pareil aussi: message d'erreur
        header('Location: ../view/signup.php?error=true');
    }

?>
