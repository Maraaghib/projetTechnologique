<?php
    if (!isset($_SESSION['Messages'] )) {
        $comment = new Comment;
        $refPost = 1;
        $_SESSION['Messages'] = $comment->findAll($refPost);
    }

    $refPost = 1;
    $comments = $_SESSION['Messages'];
?>

<h2><?php echo count($comments); ?> Commentaires</h2>

<form class="form" action="../../controller/forum.php" id="comment" method="post" style="margin-bottom: 20px;">
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <div class="form-group">
                <label for="">Publier un nouveau message </label>
                <textarea name="text-reply" class="form-control" rows="8" cols="80"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="btnComment">Envoyer</button>
        </div>
        <!-- On stocke l'id parent de chaque messsage auquel on répond -->
        <input type="hidden" name="parentId" value="0" id="parentId">
    </div>
</form>
<div class="row">
    <div class="col-lg-offset-1 col-lg-10">
        <?php $i = 0; foreach ($comments as $comment): ?>
            <!-- Afficher tous les commentaires -->
            <?php require 'oneComment.php'; ?>
            <?php foreach ($comment['replies'] as $comment): ?>
                <!-- Pour chaque commentaire, afficher ses réponses, si elles existent -->
                <div style="margin-left: 100px;">
                    <?php require 'oneComment.php'; ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
</script>
