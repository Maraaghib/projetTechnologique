<?php
   include_once('Database.php');
/**
*
*/
class Comment {

    private $db;
    private $username;
    private $message;
    private $dateComment;
    private $refPost;
    private $parentId;
    private $likes;
    // Tableau des messages d'erreurs de validation
    // private $options = array(
    //     'parent_error' => "Vous essayez de répondre à un commentaire qui n'existe pas"
    // );

    public $errors = array();

    public function __construct() {
        // $db = $db;
        // $this->options = array_merge($this->options, $options = []);
        $this->username     = "empty";
        $this->message      = "empty";
        $this->dateComment  = "empty";
        $this->refPost      = 1;
        $this->parentId     = 0;
        $this->likes        = 0;
    }

    public static function newComment($username, $message, $dateComment, $refPost, $parentId, $likes) {
        $instance = new self();
        $instance->setUsername($username);
        $instance->setMessage($message);
        $instance->setDateComment($dateComment);
        $instance->setRefPost($refPost);
        $instance->setParentId($parentId);
        $instance->setLikes($likes);

        return $instance;
    }

    /**
    * Permet de récupérer les commentaires associés à un contenu
    */
    public function findAll($refPost) {
        $query = $db->prepare("SELECT * FROM comments WHERE refPost = :refPost ORDER BY created DESC");
        $query->execute(['refPost' => $refPost]);
        $comments = $query->fetchAll();
        $replies = [];

        foreach ($comments as $k => $comment) {
            if($comment->parentId) {
                $replies[$comment->parentId][] = $comment;
                unset($comments[$k]);
            }
        }
        foreach ($comments as $k => $comment) {
            if(isset($replies[$comment->idComment])) {
                $rep = $replies[$comment->idComment];
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
    public function savePost() {
        $db = Database::getDBConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $errors = [];

        // Si on essaie de répondre à un message qui n'existe pas
        // if(!empty($_POST['parentId'])) {
        //     $query = $db->prepare("SELECT idComment FROM comments WHERE refPost = :refPost AND idComment = :idComment AND parentId = 0");
        //     $query->execute([
        //         'refPost'   => $this->getRefPost(),
        //         'idComment' => $_POST['parentId'],
        //     ]);
        //     if($query->rowCount() <= 0) {
        //         $this->errors['parent'] = $this->options['parent_error'];
        //         return false;
        //     }
        // }

        $query1 = $db->prepare("INSERT INTO comments SET
            username = :username,
            message  = :message,
            refPost   = :refPost,
            created  = :created,
            parentId = :parentId"
        );

        $data = [
            'username' => $this->getUsername(),
            'email'    => $this->getMessage(),
            'message'  => $this->getDateComment(),
            'refPost'   => $this->getRefPost(),
            'created'  => $this->getParentId(),
            'parentId' => $this->getLikes()
        ];

        $query2 = $db->prepare("INSERT INTO likes SET
            username = :username,
            refPost  = :refPost"
        );

        $data = [
            'username' => $this->getUsername(),
            'refPost'   => $this->getRefPost()
        ];

        return $query1->execute($data) && $query2->execute($data);
    }
}



?>
