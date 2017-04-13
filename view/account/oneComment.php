<!-- Le code HTML d'un seul commentaire (commentaire ou réponse) -->
<!-- Avatar + Identifiant + Date + Message + Lien pour répondre -->


<div class="comment row" style="border: solid 1px #DDD; margin: 10px 0;">
    <!-- Avatar & Prénom Nom -->
    <div class="col-xs-12 chip">
        <?php echo '<img src="../img/avatars/' .$_SESSION['User']->getAvatar(). '.png" width="95" height="95" alt="">'; ?>
        <strong><?php echo $_SESSION['Post']->getUsername(); ?></strong>
    </div>

    <!-- Date & Heure -->
    <div class="col-xs-12 dateComment"><?php echo $_SESSION['Post']->getDateComment(); ?></div>

    <!-- Message -->
    <div class="col-xs-12 message">
        <!-- Chaque bouton "Répondre" prend comme id celui du message il fait référence  -->
        <p>
            <?php echo $_SESSION['Post']->getMsg(); ?>
        </p>
    </div>

    <!-- Boutons J'aime et Répondre -->
    <div class="col-xs-12 react">
        <a href="#" class="btn-like-comment" <?php echo 'id="btn-like-comment' .$i. '"'; ?>><i class="fa fa-thumbs-up"></i> J'aime <span class="badge badge-like-comment">27    </span></a>
        <a href="#" class="btn-reply-comment" <?php echo 'data-form="formReply' .$i. '" id="btn-reply-comment' .$i. '"'; ?> data-id="<?php /*echo $comment->parentId ? $comment->parentId : $comment->id */ ?>"><i class="fa fa-comment"></i> Répondre</a>
    </div>

    <!-- Champ pou répondre -->
    <div class="col-xs-12">
        <form <?php echo 'class="formReply formReply' .$i++. '"'; ?> action="../../contoller/forum.php" method="post">
            <div class="form-group">
                <textarea name="text-reply" class="form-control" rows="1" cols="80"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="sendReply">Envoyer</button>
            </div>
        </form>
    </div>
</div>
