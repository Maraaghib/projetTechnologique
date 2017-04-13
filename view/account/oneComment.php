<!-- Le code HTML d'un seul commentaire (commentaire ou réponse) -->
<!-- Avatar + Identifiant + Date + Message + Lien pour répondre -->


<div class="comment row" style="border: solid 1px #DDD; margin: 10px 0;">
    <!-- Avatar & Prénom Nom -->
    <div class="col-xs-12 chip">
        <?php echo '<img src="../img/avatars/' .$_SESSION['User']->getAvatar(). '.png" width="95" height="95" alt="">'; ?>
        <strong><?php echo $comment->username; ?></strong>
    </div>

    <!-- Date & Heure -->
    <div class="col-xs-12 dateComment">Jeudi 13 Avril 2017 à 03:36</div>
    <!-- <em><?php //echo date('d/m/Y', strtotime($comment->created)); ?></em> -->

    <!-- Message -->
    <div class="col-xs-12">
        <!-- Chaque bouton "Répondre" prend comme id celui du message il fait référence  -->
        <p>
            <?php echo $comment->content; ?>
        </p>
    </div>

    <!-- Boutons J'aime et Répondre -->
    <div class="col-xs-12 react">
        <a href="#" class="btn-like-comment" <?php echo 'id="btn-like-comment' .$i. '"'; ?>><i class="fa fa-thumbs-up"></i> J'aime <span class="badge badge-like-comment">27    </span></a>
        <a href="#" class="btn-reply-comment" <?php echo 'data-form="formReply' .$i. '" id="btn-reply-comment' .$i. '"'; ?> data-id="<?php /*echo $comment->parent_id ? $comment->parent_id : $comment->id */ ?>"><i class="fa fa-comment"></i> Répondre</a>
    </div>

    <!-- Champ pou répondre -->
    <div class="col-xs-12">
        <form <?php echo 'class="formReply formReply' .$i++. '"'; ?> action="#" method="post">
            <div class="form-group">
                <textarea name="text-reply" class="form-control" rows="1" cols="80"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" name="sendReply">Envoyer</button>
            </div>
        </form>
    </div>
</div>
