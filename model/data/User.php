<?php
   class User {
      /* Member variables */
      private $nom;
      private $prenom;
      private $email;
      private $dateNaiss;
      private $telPerso;
      private $login;
      private $password;
      //private $confirmPassword;

      function User($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password) {
         $this->setNom($nom);
         $this->setPrenom($prenom);
         $this->setEmail($email);
         $this->setDateNaissance($dateNaiss);
         $this->setTelephone($telPerso);
         $this->setLogin($login);
         $this->setPassword($password);
      }

      /* Member functions */

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

      protected function setNom($param){
         $this->nom = $param;
      }

      public function getNom(){
         return $this->nom;
      }

      protected function setPrenom($param){
         $this->prenom = $param;
      }

      public function getPrenom(){
         return $this->prenom;
      }

      protected function setEmail($param){
         $this->email = $param;
      }

      public function getEmail(){
         return $this->email;
      }

      protected function setDateNaissance($param){
         $this->dateNaiss = $param;
      }

      public function getDateNaissance(){
         return $this->dateNaiss;
      }

      protected function setTelephone($param) {
         $this->telPerso = $param;
      }

      public function getTelephone(){
         return $this->telPerso;
      }

      protected function setLogin($param) {
         $this->login = $login;
      }

      public function getLogin(){
         return $this->login;
      }

      protected function setPassword($param){
         $this->password = $password;
      }

      public function getPassword(){ // Est-ce sûr ? Est-ce ça vaut la peine ? A quoi ça sert ?
         return $this->password;
      }


   }
?>
