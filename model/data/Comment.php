<?php
   include_once('Database.php');
/**
*
*/
class Comments {

    private $db;
    private $nom;
    private $message;
    private $dateComment;
    private $refPost;
    private $parentId;
    private $likes;
    // Tableau des messages d'erreurs de validation
    private $options = array(
        'content_error' => "Vous n'avez pas entré de message",
        'parent_error' => "Vous essayez de répondre à un commentaire qui n'existe pas"
    );

    public $errors = array();

    public function __construct() {
        // $this->db = $db;
        // $this->options = array_merge($this->options, $options = []);
        $this->nom          = "empty";
        $this->message      = "empty";
        $this->dateComment  = "empty";
        $this->refPost      = 1;
        $this->parentId     = 0;
        $this->likes        = 0;
    }

    public static function newComment($username, $message, $dateComment, $refPost, $parentId, $likes) {
        $instance = new self();
        $instance->setUsername($nom);
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

    /***************Getters et setters******************/
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setDateComment($dateComment){               
        $this->dateComment = $dateComment;
    }

    public function getDateComment(){
        return $this->dateComment;
    }

    public function setRefPost($refPost){
        $this->refPost = $refPost;
    }

    public function getRefPost(){
        return $this->refPost;
    }

    public function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    public function getParentId(){
        return $this->parentId;
    }

    public function setLikes($likes) {
        $this->likes = $likes;
    }

    public function getLikes(){
        return $this->likes;
    }
}
?>
