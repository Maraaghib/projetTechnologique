<?php
// Classe utilisateur contenant les informations d'un utilisateur inscrit
class User {

    private $nom;
    private $prenom;
    private $email;
    private $dateNaiss;
    private $telPerso;
    private $login;
    private $password;


    // Créé un utilsateur vide
    // Entrée : informations personnelles de l'utilisateur
    // Sortie : ø
    function __construct() {
        $this->nom       = "empty";
        $this->prenom    = "empty";
        $this->email     = "empty";
        $this->dateNaiss = "empty";
        $this->telPerso  = "empty";
        $this->login     = "empty";
        $this->password  = "empty";
    }

    // Simuler un constructeur avec des paramètres
    public static function newUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password) {
        $instance = new self();
        $instance->setNom($nom);
        $instance->setPrenom($prenom);
        $instance->setEmail($email);
        $instance->setDateNaissance($dateNaiss);
        $instance->setTelephone($telPerso);
        $instance->setLogin($login);
        $instance->setPassword($password);

        return $instance;
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

    public function getPassword(){ // Pose pas de problème puisque le mot de passe est invisible (i.e haché)
        return $this->password;
    }
}
?>
