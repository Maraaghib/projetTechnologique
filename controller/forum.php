<?php

    include_once('../model/data/Database.php');
    include_once('../model/data/Comment.php');

    session_start();

    $textEn = array(
        "Monday", "Tuesday", "Wednesday", "Thursday",
        "Friday", "Saturday", "Sunday", "January",
        "February", "March", "April", "May",
        "June", "July", "August", "September",
        "October", "November", "December"
    );
    $textFr = array(
        "Lundi", "Mardi", "Mercredi", "Jeudi",
        "Vendredi", "Samedi", "Dimanche", "Janvier",
        "Février", "Mars", "Avril", "Mai",
        "Juin", "Juillet", "Août", "Septembre",
        "Octobre", "Novembre", "Décembre"
    );

    $dateEn = date("l d F Y à H:i:s"); // Récupérer la date et l'heure en Anglais
    $dateComment = str_replace($textEn,$textFr,$dateEn); // Les traduire en français
    // echo $dateFr;

    $username = $_SESSION['User']->getLogin(); //"hamza", //$_SESSION['User']->getLogin(),
    $message  = $_POST['text-reply']; //"Commentaire par défaut", //$_POST['content'],
    $refPost   = 1; // Dans la page du post, je garde son id dans un input hidden, que je vais envoyer par post
    $parentId = 0; //$_POST['parentId'];
    // $likes = 18;

    $comment = Comment::newComment($username, $message, $dateComment, $refPost, $parentId); //, $likes



    include('../model/forum.php');

    // var_dump($comment); die();

    // if ($isSaved) {
    //     $comment->hydrate($comment->findAll($refPost));
    //     $_SESSION['Post'] = $comment;
    //
    //     header('Location: ../view/account/pages/forum.php');
    // }
    // elseif (!isset($_SESSION['Post'])) {
        $refPost = 1;
        $comments = $comment->findAll($refPost);

        while ($donnees = $comments) {
            $listMessages[] = $comment->hydrate($donnees);
        }

        $_SESSION['Post'] = $comment;
        $_SESSION['Messages'] = $listMessages;
        
        header('Location: ../view/account/pages/forum.php');
    // }
    // elseif (isset($_SESSION['Post'])) {
    //     header('Location: ../view/account/pages/forum.php');
    // }
    // else {
    //     // Pareille aussi: Message d'erreur
    //     header('Location: ../view/account/pages/forum.php?error=true'); // Passer en GET l'/es erreur/s de connexion ???
    // }

    // $comment = User::newUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password, $avatar); // Crée une nouvelle instance de User avec des paramètres
    //
    // include('../model/signup.php');
    //
    // if ($isSaved) {
    //     $user->hydrate($user->getUser($login));
    //     $_SESSION['User'] = $user;
    //
    //     header('Location: ../view/account/');
    // }
    // else {
    //     // Pareille aussi: Message d'erreur
    //     header('Location: ../view/signup.php?error=true'); // Passer en GET l'/es erreur/s de connexion ???
    // }

?>
