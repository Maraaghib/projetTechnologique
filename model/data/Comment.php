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
    // private $likes;
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
        // $this->likes        = 0;
    }

    public static function newComment($username, $message, $dateComment, $refPost, $parentId) { // $likes
        $instance = new self();
        $instance->setUsername($username);
        $instance->setMessage($message);
        $instance->setDateComment($dateComment);
        $instance->setRefPost($refPost);
        $instance->setParentId($parentId);
        // $instance->setLikes($likes);

        return $instance;
    }

    public function hydrate($donnees) {
        if (isset($donnees['username'])) {
            $this->username = $donnees['username'];
        }
        if (isset($donnees['message'])) {
            $this->message = $donnees['message'];
        }
        if (isset($donnees['dateComment'])) {
            $this->dateComment = $donnees['dateComment'];
        }
        if (isset($donnees['refPost'])) {
            $this->refPost = $donnees['refPost'];
        }
        if (isset($donnees['parentId'])) {
            $this->parentId = $donnees['parentId'];
        }
        // if (isset($donnees['likes'])) {
        //     $this->likes = $donnees['likes'];
        // }
    }
    /**
    * Permet de récupérer les commentaires associés à un contenu
    */
    public function findAll($refPost) {
        $db = Database::getDBConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT * FROM comments WHERE refPost = :refPost ORDER BY dateComment DESC");
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
        $atime = strtotime($a->dateComment);
        $btime = strtotime($b->dateComment);
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
            dateComment  = :dateComment,
            parentId = :parentId"
        );

        $data1 = [
            'username' => $this->getUsername(),
            'message'  => $this->getMsg(),
            'refPost'   => $this->getRefPost(),
            'dateComment'  => $this->getDateComment(),
            'parentId' => $this->getParentId()
        ];

        // $query2 = $db->prepare("INSERT INTO likes SET
        //     username = :username,
        //     refPost  = :refPost"
        // );
        //
        // $data2 = [
        //     'username' => $this->getUsername(),
        //     'refPost'   => $this->getRefPost()
        // ];
        // $result2 = $query2->execute($data2);

        $result1 = $query1->execute($data1);

        return $result1;
    }


    /***************Getters et setters******************/
    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getMsg(){
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

    // public function setLikes($likes) {
    //     $this->likes = $likes;
    // }
    //
    // public function getLikes(){
    //     return $this->likes;
    // }
}
?>
