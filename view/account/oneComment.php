<!-- Le code HTML d'un seul commentaire (commentaire ou réponse) -->
<!-- Avatar + Identifiant + Date + Message + Lien pour répondre -->
<div class="comment row" style="border: solid 1px #DDD; margin: 10px 0;">
    <div class="col-xs-2">
        <img src="http://gravatar.com/avatar/" <?php echo md5($comment->email); ?> width="100%" alt="">
    </div>
    <div class="col-xs-10">
        <strong><?php echo $comment->username; ?></strong>
        <em><?php echo date('d/m/Y', strtotime($comment->created)); ?></em>
        <!-- Chaque bouton "Répondre" prend comme id celui du message il fait référence  -->
        <a href="#" class="reply" data-id="<?php echo $comment->parent_id ? $comment->parent_id : $comment->id  ?>">Répondre</a>
        <p>
            <?php echo $comment->content; ?>
        </p>
    </div>
</div>
