<?php
   include_once('Database.php');
// Classe utilisateur contenant les informations d'un utilisateur inscrit
class User {

    private $nom;
    private $prenom;
    private $email;
    private $dateNaiss;
    private $telPerso;
    private $login;
    private $password;
    private $avatar;
    private $error;
    private $db; // = Database::getDBConnection(); // Se connecter à la base de données

    function __construct() {
        $this->nom       = "empty";
        $this->prenom    = "empty";
        $this->email     = "empty";
        $this->dateNaiss = "empty";
        $this->telPerso  = "empty";
        $this->login     = "empty";
        $this->password  = "empty";
        $this->avatar    = "img_avatar0";
    }

    // Simuler un constructeur avec des paramètres
    public static function newUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password, $avatar) {
        $instance = new self();
        $instance->setNom($nom);
        $instance->setPrenom($prenom);
        $instance->setEmail($email);
        $instance->setDateNaissance($dateNaiss);
        $instance->setTelephone($telPerso);
        $instance->setLogin($login);
        $instance->setPassword($password);
        $instance->setAvatar($avatar);

        return $instance;
    }


    // Permet d'éviter les doublons d'email et de login dans la base de données
    // Entrée : email et login renseignés 
    // Sortie : vrai si le login ou email est unique, faux sinon.
    public function existUser($email, $login){
      $db = Database::getDBConnection();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $queryEmail = $db->prepare("SELECT email FROM user_account WHERE email = :email");
      $queryEmail->execute(['email' => $email]);

      $queryLogin = $db->prepare("SELECT login FROM user_account WHERE login = :login");
      $queryLogin->execute(['login' => $login]);

      $resultEmail = $queryEmail->fetch();
      $resultLogin = $queryLogin->fetch();

      if ($resultEmail){
        $this->error = "Cet email est déjà utilisé";
        return true;
      }
      if ($resultLogin){
        $this->error = "Ce login est déjà utilisé";
        return true;
      }
      return false;
    }

    // Ajoute un utilisateur et ses informations personnelles dans la base de données
    public function addUser() {
      $db = Database::getDBConnection();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $query = $db->prepare("INSERT INTO user_account SET
           nom        = :nom,
           prenom     = :prenom,
           email      = :email,
           dateNaiss  = :dateNaiss,
           telPerso   = :telPerso,
           login      = :login,
           password   = :password,
           avatar     = :avatar"
       );

       $data = [
           'nom'       => $this->getNom(),
           'prenom'    => $this->getPrenom(),
           'email'     => $this->getEmail(),
           'dateNaiss' => $this->getDateNaissance(),
           'telPerso'  => $this->getTelephone(),
           'login'     => $this->getLogin(),
           'password'  => $this->getPassword(),
           'avatar'    => $this->getAvatar()
       ];

      //  Envoi de mail pour confirmation de la création du compte
       $message = "Merci pour votre inscription sur le forum des séniors. \n";
       $message .= "Vos informations personnelles : \n";
       $message .= "Nom : ".$this->getNom()." \n";
       $message .= "Prénom : ".$this->getPrenom()." \n";
       $message .= "Date de naissance : ".$this->getDateNaissance()." \n";
       $message .= "Téléphone : ".$this->getTelephone()." \n";
       $message .= "Login : ".$this->getLogin();
       mail($this->getEmail(), 'Inscription sur le forum des séniors', $message);

       return $query->execute($data);
    }

    // Connecte l'utilisateur si son login et password sont valides
    // Entrée : son login et son mot de passe
    // Sortie : l'utilisateur connecté
    public function connectUser($login, $password) {
        $db = Database::getDBConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query1 = $db->prepare("SELECT login FROM user_account WHERE login = :login");
        $query1->execute(['login' => $login]);
        $query2 = $db->prepare("SELECT password FROM user_account WHERE login = :login");

      //   $query3 = "SELECT nom, prenom, email, dateNaiss, telPerso FROM user_account WHERE login = `".$login."`";

        $result1 = $query1->fetch();
        if ($result1) { // Si le login existe dans la base de données
            $query2->execute(['login' => $login]);
            $result2 = $query2->fetch();
            if (($result2) && (strcmp($result2["password"], $password) == 0)) {
                //$result3 = $db->query($query3);
                return true;
            }
            else {
                $this->error = "Le mot de passe que vous avez saisi est incorrect";
                return false;
            }
        }
        else {
            $this->error = "L'identifiant que vous avez saisi est incorrect";
            return false;
        }

        return true;
    }

// A transférer dans la classe Database
    public function getUser($login){
        $db = Database::getDBConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = $db->prepare("SELECT * FROM user_account WHERE login = :login");
      $query->execute(['login' => $login]);
      $infosUser = $query->fetch();
      return $infosUser;
    }

    // Retourne tous les utilisateur présents dans la base de données
    // Entrée : ø
    // Sortie : tous les utilisateurs
    public function getUsers() {  // Fonction à revoir après !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $db = Database::getDBConnection();
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $query = "SELECT * FROM user_account";
       $results = $db->query($query);

       while($donnees = $results->fetch()){
          $infosUser[] = hydrate($donnees);
       }

       return $infosUser;
    }


    // Stocke les données dans l'utilisateur
    // Entrée : tableau contenant les données personnelles de l'utilisateur
    // Sortie : ø
    public function hydrate($donnees) {
        if (isset($donnees['nom'])) {
            $this->nom = $donnees['nom'];
        }
        if (isset($donnees['prenom'])) {
            $this->prenom = $donnees['prenom'];
        }
        if (isset($donnees['email'])) {
            $this->email = $donnees['email'];
        }
        if (isset($donnees['dateNaiss'])) {
            $this->dateNaiss = $donnees['dateNaiss'];
        }
        if (isset($donnees['telPerso'])) {
            $this->telPerso = $donnees['telPerso'];
        }
        if (isset($donnees['login'])) {
            $this->login = $donnees['login'];
        }
        if (isset($donnees['password'])) {
            $this->password = $donnees['password'];
        }
        if (isset($donnees['avatar'])) {
            $this->avatar = $donnees['avatar'];
        }
    }


    /***************Getters et setters******************/
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setDateNaissance($dateNaiss){
        $this->dateNaiss = $dateNaiss;
    }

    public function getDateNaissance(){
        return $this->dateNaiss;
    }

    public function setTelephone($telPerso) {
        $this->telPerso = $telPerso;
    }

    public function getTelephone(){
        return $this->telPerso;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){ // Ne pose pas de problème puisque le mot de passe est invisible (i.e haché)
        return $this->password;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getAvatar(){
        return $this->avatar;
    }
}
?>
