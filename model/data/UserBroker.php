<?php
   include_once('User.php');

   class UserBroker {

      private $config;
      private $user;
      private $error;


      // Créé un utilisateur et récupère les informations de connection contenues dans config.ini
      // Entrée : ø
      // Sortie : ø
      public function __construct(User $user, array $config = [], $error) {
         $this->user = $user;
         $this->config = $config;
         $this->error = $error;
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
         $db = $this->db_reconnect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query = "INSERT INTO `user_account` (nom`, `prenom`, `email`, `dateNaiss`, `telPerso`, `login`, `password`) VALUES (:nom, :prenom, :email, :dateNaiss, :telPerso, :login, :password)";
         $stmt = $db->prepare($query);
         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':prenom', $prenom);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':dateNaiss', $dateNaiss);
         $stmt->bindParam(':telPerso', $telPerso);
         $stmt->bindParam(':login', $login);
         $stmt->bindParam(':password', $password);
         $stmt->execute();

         return $stmt;
      }

      // Connecte l'utilisateur si son login et password sont valides
      // Entrée : son login et son mot de passe
      // Sortie : l'utilisateur connecté
      public function connectUser($login, $password) {

          $db = $this->db_reconnect(); //contient le PDO entre le serveur et la bdd
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query1 = $db->prepare("SELECT login FROM user_account WHERE login = :login");
          $query1->execute(['login' => $login]);
          echo "<br><br>La requête 1 est : SELECT login FROM user_account WHERE login = `".$login."`<br>";
          $query2 = $db->prepare("SELECT password FROM user_account WHERE login = :login");

        //   $query3 = "SELECT nom, prenom, email, dateNaiss, telPerso FROM user_account WHERE login = `".$login."`";

          $result1 = $query1->fetch();
          if ($result1) { // Si le login existe dans la base de données
              $query2->execute(['login' => $login]);
              $result2 = $query2->fetch();
                  echo "Mot de passe ".$result2["password"];
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
              $this->error = "L'identifiant' que vous avez saisi est incorrect";
              return false;
          }

        //   $infosUser = $result3->fetch();
        //   $oneUser = new User;
        //   $oneUser->hydrate($infosUser);

          return true;
      }

      // Retourne tous les utilisateur présents dans la base de données
      // Entrée : ø
      // Sortie : tous les utilisateurs
      public function getUsers() {  // Fonction à revoir après !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         $db = $this->db_reconnect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query = "SELECT * FROM user_account";
         $results = $db->query($query);

         while($donnees = $results->fetch()){
            $infosUser[] = hydrate($donnees);
         }

         return $infosUser;
      }
   }

?>
