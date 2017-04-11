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
         try {
            return new PDO('mysql:host=' . $this->config['db_hostname'] . '; dbname=' . $this->config['db_name'], $this->config['db_user'], $this->config['db_password']);
         } catch (PDOException $e) {
            print "Connection failed : " . $e->getMessage() . "<br/>";
         }
      }

      // Ajoute un utilisateur et ses informations personnelles dans la base de données
      // Entrée : informations personnelles de l'utilisateur
      // Sortie : ø
      public function addUser(User $user) {
         // The message

         $db = $this->db_reconnect();
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $query = $db->prepare("INSERT INTO user_account SET
             nom        = :nom,
             prenom     = :prenom,
             email      = :email,
             dateNaiss  = :dateNaiss,
             telPerso   = :telPerso,
             login      = :login,
             password   = :password"
         );

         $data = [
             'nom'       => $user->getNom(),
             'prenom'    => $user->getPrenom(),
             'email'     => $user->getEmail(),
             'dateNaiss' => $user->getDateNaissance(),
             'telPerso'  => $user->getTelephone(),
             'login'     => $user->getLogin(),
             'password'  => $user->getPassword()
         ];

        //  Envoi de mail pour confirmation de la création du compte
         $message = "Merci pour votre inscription sur le forum des séniors. \nVos informations personnelles : \nNom : ".$nom." \nPrénom : ".$prenom." \nDate de naissance : ".$dateNaiss." \nTéléphone : ".$telPerso." \nLogin : ".$login;
         mail($email, 'Inscription sur le forum des séniors', $message);

         return $query->execute($data);
      }

      // Connecte l'utilisateur si son login et password sont valides
      // Entrée : son login et son mot de passe
      // Sortie : l'utilisateur connecté
      public function connectUser($login, $password) {

          $db = $this->db_reconnect(); //contient le PDO entre le serveur et la bdd
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
              $this->error = "L'identifiant' que vous avez saisi est incorrect";
              return false;
          }

          return true;
      }

      protected function setUser(User $user){
         $this->user = $user;
      }

      public function getUser($login){
        $query = $db->prepare("SELECT * FROM user_account WHERE login = :login");
        $query->execute(['login' => $login]);
        $infosUser = $query->fetch();
        return $this->user;
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
