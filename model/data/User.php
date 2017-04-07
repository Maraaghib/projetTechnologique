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
      function User($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password) {
         $this->setNom($nom);
         $this->setPrenom($prenom);
         $this->setEmail($email);
         $this->setDateNaissance($dateNaiss);
         $this->setTelephone($telPerso);
         $this->setLogin($login);
         $this->setPassword($password);
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
      protected function setNom($nom){
         $this->nom = $nom;
      }

      public function getNom(){
         return $this->nom;
      }

      protected function setPrenom($prenom){
         $this->prenom = $prenom;
      }

      public function getPrenom(){
         return $this->prenom;
      }

      protected function setEmail($email){
         $this->email = $email;
      }

      public function getEmail(){
         return $this->email;
      }

      protected function setDateNaissance($dateNaiss){
         $this->dateNaiss = $dateNaiss;
      }

      public function getDateNaissance(){
         return $this->dateNaiss;
      }

      protected function setTelephone($telPerso) {
         $this->telPerso = $telPerso;
      }

      public function getTelephone(){
         return $this->telPerso;
      }

      protected function setLogin($login) {
         $this->login = $login;
      }

      public function getLogin(){
         return $this->login;
      }

      protected function setPassword($password){
         $this->password = $password;
      }
   }
?>
