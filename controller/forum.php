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

    if ((isset($_POST["btnComment"])) || (isset($_POST["sendReply"]))) {
        $username = $_SESSION['User']->getLogin();
        $message  = $_POST['text-reply']; //"Commentaire par défaut"
        $refPost   = 1; // Dans la page du post, je garde son id dans un input hidden, que je vais envoyer par post
        $parentId = ($_POST["parentId"]) ? $_POST["parentId"] : 0;

        $comment = Comment::newComment($username, $message, $dateComment, $refPost, $parentId);

        include('../model/forum.php');

        $_SESSION['Messages'] = $comment->findAll($refPost);

    }
    else {
        if (!isset($_SESSION['Messages'] )) {
            $comment = new Comment;
            $refPost = 1;
            $_SESSION['Messages'] = $comment->findAll($refPost);
        }
    }

    header('Location: ../view/account/index.php?p=forum');

?>
