<?php
/*
* Récupératioin de l'article
*/
// Dans le cas où on n'a pas donné le paramètre slug sur l'URL
// if(!isset($_GET['slug'])) {
//     throw new Exception('404');
// }
// try {
//     $DB = new PDO('mysql:host=dbserver;dbname=saseye', 'saseye', '120191244');
// } catch (PDOException $e) {
//     die('Impossible de se connecter à la base de données');
// }
//
// $DB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//
//
// define('DS', DIRECTORY_SEPARATOR);
// define('VIEWS', __DIR__ .DS. 'views' .DS); // __DIR__ est le répertoire du projet (ici C:\wamp64\www\forum)
// // define('ELEMENTS', __DIR__ .DS. 'views' .DS. 'elements' .DS);
//

// Récupération du post
/*
$id = 1; // L'id du message posté

$query = $DB->prepare('SELECT * FROM posts WHERE id = :id');
$query->execute(['id' => $id]);
$post = $query->fetch();

if (!$post) {
    throw new  Exception('404');
}
*/

/*
* Nos commentaires
*/

// spl_autoload_register('autoload');
// function autoload($class) {
//     require '../../class' .DS .str_replace('\\', DS, $class). '.php';
// }

// use Hamza\Plugin\Comments;
// echo(__DIR__."../../../"); die();
// include('../../model/data/Comment.php');
/*
/*
require('../../model/data/Comments.php');
$commentCls = new Comments($DB, $opt = array());
$comments = $commentCls->findAll($post->id);
*/

// Soummission d'un commentaire
// $errors = false;
// $success = false;
// if (isset($_POST['btnComment'])) {
//     $save = $commentCls->save($post->id); // Enregistrer le commentaire pour le post dont l'id est passé en parmètre
//     if($save) {
//         $success = true;
//     }
//     else {
//         $errors = $commentCls->errors;
//     }
//
//     // header('Location: ../../../forum/index.php?p=posts.view&slug=mon-super-slug');
// }
/*
* CONTENU
*/
// session_start();
// header('Location: ../../../controller/forum.php');
// if (!isset($_SESSION['Messages'])) {
// header('Location: ../../controller/forum.php');



    // foreach ($comments as $donnees) {
    //     var_dump($donnees);
    // }
    // die();
    // $comment->hydrate($donnees);
    // $listMessages[] = $comment->hydrate($donnees);
    //
    // $_SESSION['Post'] = $comment;
    // $_SESSION['Messages'] = $listMessages;
// }
if (!isset($_SESSION['Messages'] )) {
    $comment = new Comment;
    $refPost = 1;
    $_SESSION['Messages'] = $comment->findAll($refPost);
}

$refPost = 1;
$comments = $_SESSION['Messages'];
// var_dump( $comments); die();
// $comments = $comment->findAll($refPost);
?>

<!-- Affichage du post -->
<!-- Un post dot avoir une date et heure et l'id de la personne qui l'a publié -->

<!-- Un moyen de récupérer  -->
<h1><?php //echo $post->name; ?></h1>

<?php //echo "<h1>" .$post->content. "</h1>"; ?>



<?php
    // $query = $DB->query("SELECT * FROM comments WHERE refPost = {$post->id} AND ref='posts' ORDER BY created DESC");
    // $comments = $query->fetchAll();
?>

<h2><?php echo count($comments); ?> Commentaires</h2>


<?php// if($errors): ?>
    <!-- <div class="alert alert-danger"> -->
        <!-- <strong>Impossible de poster votre commentaire pour les raisons suivantes:</strong> -->
        <!-- <ul> -->
            <?php// foreach ($errors as $error): ?>
                <!-- <li><?php// echo $error; ?></li> -->
            <?php// endforeach; ?>
        <!-- </ul> -->
    <!-- </div> -->
<?php// endif ?>
<?php// if($success): ?>
    <!-- <div class="alert alert-success">
        <strong>Bravo. Votre commentaire a bien été publié</strong>
    </div> -->
<?php// endif ?>

<form class="form" action="../../controller/forum.php" id="comment" method="post" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <div class="form-group">
                <label for="">Publier un nouveau message </label>
                <textarea name="text-reply" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="btnComment">Envoyer</button>
        </div>
        <!-- On stock l'id parent de chaque messsage auquel on répond -->
        <input type="hidden" name="parentId" value="0" id="parentId">
        <!-- <input type="hidden" name="action" value="comment"> -->
    </div>
</form>
<?php
    // $commentCls = new Comment;

 //var_dump($_SESSION['Post']); die(); ?>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <?php $i = 0; foreach ($comments as $comment): ?>
            <!-- Afficher tous les commentaires -->
            <?php require 'oneComment.php'; ?>
            <?php foreach ($comment['replies'] as $comment): ?>
                <!-- Pour chaque commentaire, afficher ses réponses, s'ils en existent -->
                <div style="margin-left: 100px;">
                    <?php require 'oneComment.php'; ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    // (function($){
    //     $('.btn-reply-comment').click(function(ev){
    //         // Faire de telle sorte que si on clique, un modal s'ouvre avec le message à répondre au-dessus du champ de réponse
    //         ev.preventDefault();
    //         var $this = $(this);
    //         var $comment = $(this).parents('.comment');
    //         var $form = $('#comment');
    //         var id = $this.data('id'); // L'id du bouton "Répondre"
    //         console.log(id);
    //         $form.hide();
    //         $comment.after($form);
    //         $form.slideDown();
    //         $('#parentId').val(id); // On stocke l'id du bouton "Répondre" dans un input hidden
    //     })
    // })(jQuery);
</script>
