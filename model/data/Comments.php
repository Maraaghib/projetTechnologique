<?php
/**
*
*/
// namespace Hamza\Plugin;
class Comments {

    private $db;
    // Tableau des messages d'erreurs de validation
    private $options = array(
        'username_error' => "Vous n'avez pas entré de pseudo",
        'email_error' => "Votre email n'est pas valide",
        'content_error' => "Vous n'avez pas entré de message",
        'parent_error' => "Vous essayez de répondre à un commentaire qui n'existe pas"
    );
    public $errors = array();

    public function __construct($db, $options) {
        $this->db = $db;
        $this->options = array_merge($this->options, $options = []);
    }

    /**
    * Permet de récupérer les commentaires associés à un contenu
    */
    public function findAll($refPost) {
        $query = $this->db->prepare("SELECT * FROM comments WHERE refPost = :refPost ORDER BY created DESC");
        $query->execute(['refPost' => $refPost]);
        $comments = $query->fetchAll();
        $replies = [];

        foreach ($comments as $k => $comment) {
            if($comment->parent_id) {
                $replies[$comment->parent_id][] = $comment;
                unset($comments[$k]);
            }
        }
        foreach ($comments as $k => $comment) {
            if(isset($replies[$comment->id])) {
                $rep = $replies[$comment->id];
                usort($rep, [$this, 'sortReplies']);
                $comments[$k]->replies = $rep;
            }
            else {
                $comments[$k]->replies = [];
            }
        }
        return $comments;
    }

    public function sortReplies($a, $b) {
        $atime = strtotime($a->created);
        $btime = strtotime($b->created);
        return $btime < $atime ? 1 : -1;
    }

    /**
    * Permet d sauvegarder un commentaire
    */
    public function save($refPost) {
        $errors = [];
        if(empty($_SESSION['User']->getLogin())) {
            $errors['username'] = $this->options['username_error'];
        }

        if(empty($_SESSION['User']->getEmail()) || !filter_var($_SESSION['User']->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = $this->options['email_error'];
        }

        if(empty($_POST['content'])) {
            $errors['content'] = $this->options['content_error'];
        }

        if(count($errors) > 0) {
            $this->errors = $errors;
            return false;
        }

        // Si on essaie de répondre à un message qui n'existe pas
        if(!empty($_POST['parent_id'])) {
            $query = $this->db->prepare("SELECT id FROM comments WHERE refPost = :refPost AND id = :id AND parent_id = 0");
            $query->execute([
                'refPost' => $refPost,
                'id' =>   $_POST['parent_id'],
            ]);
            if($query->rowCount() <= 0) {
                $this->errors['parent'] = $this->options['parent_error'];
                return false;
            }
        }

        $query = $this->db->prepare("INSERT INTO comments SET
            username = :username,
            email    = :email,
            content  = :content,
            refPost   = :refPost,
            created  = :created,
            parent_id = :parent_id"
        );
        $data = [
            'username' => $_SESSION['User']->getLogin(),
            'email'    => $_SESSION['User']->getEmail(),
            'content'  => $_POST['content'],
            'refPost'   => $refPost,
            'created'  => date('Y-m-d H:i:s'),
            'parent_id' => $_POST['parent_id']
        ];

        return $query->execute($data);
    }
}



?>
