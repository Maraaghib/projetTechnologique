<?php

    include_once('../model/data/Database.php');

    session_start();

    // $account = $_SESSION['account'];

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
       header('Location: ../view/account/');
    //    Faire comme dans  la connexion: récupérer les infos
    }
    else {
        // Pareille aussi: Message d'erreur
       echo "L'utilisateur n'a pas été ajouté !<br>";
    }

?>
