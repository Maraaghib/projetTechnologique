<?php
   include_once('Database.php');

// Classe commentaire avec le nom de l'utilisateur qui l'a posté, son message, la date du commentaire, la référence du post.
class Comment {

    private $username;
    private $message;
    private $dateComment;
    private $refPost;
    private $parentId;

    public $errors = array();

    // Constructeur par défaut
    // Entrée : ø
    // Sortie : ø
    public function __construct() {
        $this->username     = "empty";
        $this->message      = "empty";
        $this->dateComment  = "empty";
        $this->refPost      = 1;
        $this->parentId     = 0;
    }

    // Créé un nouveau commentaire
    // Entrée : tableau contenant les données relatives au commentaire
    // Sortie : le commentaire créé
    public static function newComment($username, $message, $dateComment, $refPost, $parentId) {
        $instance = new self();
        $instance->setUsername($username);
        $instance->setMessage($message);
        $instance->setDateComment($dateComment);
        $instance->setRefPost($refPost);
        $instance->setParentId($parentId);

        return $instance;
    }

    // Stocke les données dans le commentaire
    // Entrée : tableau contenant les données relatives au commentaire
    // Sortie : ø
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
    }

    // Permet de récupérer les commentaires associés à un contenu
    // Entrée : référence du post  
    // Sortie : la liste des commentaires
    public function findAll($refPost) {
        $db = Database::getDBConnection2();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("SELECT * FROM comments WHERE refPost = :refPost ORDER BY dateComment ASC");
        $query->execute(['refPost' => $refPost]);
        $comments = $query->fetchAll();
        $replies = [];

        foreach ($comments as $k => $comment) {
            if($comment['parentId']) {
                $replies[$comment['parentId']][] = $comment;
                unset($comments[$k]);
            }
        }
        foreach ($comments as $k => $comment) {
            if(isset($replies[$comment['idComment']])) {
                $rep = $replies[$comment['idComment']];
                usort($rep, [$this, 'sortReplies']);
                $comments[$k]['replies'] = $rep;
            }
            else {
                $comments[$k]['replies'] = [];
            }
        }
        return $comments;
    }


    // Trie les commentaires en fonction de l'heure
    // Entrée : ø
    // Sortie : ø
    public function sortReplies($a, $b) {
        $atime = strtotime($a['dateComment']);
        $btime = strtotime($b['dateComment']);
        return $btime > $atime ? 1 : -1;
    }


    // Permet de sauvegarder un commentaire
    // Entrée : ø 
    // Sortie : Vrai si le commentaire est bien inséré, faux sinon 
    public function savePost() {
        $db = Database::getDBConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $errors = [];

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
}
?>
