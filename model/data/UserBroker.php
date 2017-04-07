<?php
   include_once('User.php');

   class UserBroker {

      private $config;
      private $user;


      // Créé un utilisateur et récupère les informations de connection contenues dans config.ini
      // Entrée : ø
      // Sortie : ø
      public function __construct(User $user, array $config = []) {
         $this->user = $user;
         $this->config = $config;
      }

      // Se connecte au serveur
      // Entrée : ø
      // Sortie : La connexion entre le serveur et la base de données
      private function db_reconnect() {
         print_r($this->config);
         try {
            return new PDO('mysql:host=' . $this->config['db_hostname'] . '; dbname=' . $this->config['db_name'], $this->config['db_user'], $this->config['db_password']);
         } catch (PDOException $e) {
            print "Connection failed : " . $e->getMessage() . "<br/>";
         }
      }

      // Ajoute un utilisateur et ses informations personnelles dans la base de données
      // Entrée : informations personnelles de l'utilisateur
      // Sortie : ø
      public function addUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password) {
         // The message
         $message = "Merci pour votre inscription sur le forum des séniors. \nVos informations personnelles : \nNom : ".$nom." \nPrénom : ".$prenom." \nDate de naissance : ".$dateNaiss." \nTéléphone : ".$telPerso." \nLogin : ".$login;

         mail($email, 'Inscription sur le forum des séniors', $message);
         $id = 0;
         $db = $this->db_reconnect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query = "INSERT INTO `user_account` (`ID`, `nom`, `prenom`, `email`, `dateNaiss`, `telPerso`, `login`, `password`) VALUES (:ID, :nom, :prenom, :email, :dateNaiss, :telPerso, :login, :password)";
         $stmt = $db->prepare($query);
         $stmt->bindParam(':ID', $id);
         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':prenom', $prenom);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':dateNaiss', $dateNaiss);
         $stmt->bindParam(':telPerso', $telPerso);
         $stmt->bindParam(':login', $login);
         $stmt->bindParam(':password', $password);
         $stmt->execute();
      }

      // Connecte l'utilisateur si son login et password sont valides
      // Entrée : son login et son mot de passe
      // Sortie : l'utilisateur connecté
      public function connectUser($login, $password){
         $correctPassword = false;
         $correctLogin = false;

         $db = $this->db_reconnect(); //contient le PDO entre le serveur et la bdd
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query1 = "SELECT login FROM user_account WHERE login = `".$login."`";
         $query2 = "SELECT password FROM user_account WHERE login = `".$login."`";
         $query3 = "SELECT nom, prenom, email, dateNaiss, telPerso FROM user_account WHERE login = `".$login."`";

         $result1 = $db->query($query1);
         if ($result1->fetch()) { // Si le login existe dans la base de données
            $correctLogin = true;
            $result2 = $db->query($query2);
            if (($result = $result2->fetch()) && (strcmp($result["password"], $password) == 0)) {
                $correctPassword = true;

                $result3 = $db->query($query3);
            }
         }

         if((!$correctLogin) || (!$correctPassword)){
            echo '<h1>Le login et/ou le mot de passe est incorrect !</h1>';
         }
         else{
            $infosUser = $result3->fetch();
            $oneUser = new User;
            $oneUser->hydrate($infosUser);
         }
         return $oneUser;
      }

      // Retourne tous les utilisateur présents dans la base de données
      // Entrée : ø
      // Sortie : tous les utilisateurs
      public function getUsers()
      {
         $db = $this->db_reconnect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query = "SELECT * FROM user_account";
         $results = $db->query($query);

         while($donnees = $results->fetch()){
            $abonnes[] = hydrate($donnees);
         }
         return $abonnes;
      }
   }

?>
