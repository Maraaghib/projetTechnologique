<?php
   include_once('User.php');

   class UserBroker {

      private $config;
      private $userOnline;

      public function UserBroker() { //créé un user avec le login et le password pour se connecter au dbserver
         $this->userOnline = new User();
         $this->config = parse_ini_file('../private/config.ini');
      }

      private function db_reconnect() { //se connecte au serveur avec les données dans config, et retourne la connexion entre le serveur et la bdd
         print_r($this->config);
         echo 'mysql:host=' . $this->config['db_hostname'] . '; dbname=' . $this->config['db_name'] . ',' . $this->config['db_user'] . ',' . $this->config['db_password'] . '<br>';
         try {
            return new PDO('mysql:host=' . $this->config['db_hostname'] . '; dbname=' . $this->config['db_name'], $this->config['db_user'], $this->config['db_password']);
         } catch (PDOException $e) {
            print "Connection failed : " . $e->getMessage() . "<br/>";
         }
      }

      public function addUser($nom, $prenom, $email, $dateNaiss, $telPerso, $login, $password) { //ajoute un utilisateur dans la bdd
         // The message
         $message = "Merci pour votre inscription sur le site blabla. \nVos informations personnelles : \nNom : ".$nom." \nPrénom : ".$prenom." \nDate de naissance : ".$dateNaiss." \nTéléphone : ".$telPerso." \nLogin : ".$login;
         // In case any of our lines are larger than 70 characters, we should use wordwrap()

         // Send
         mail($email, 'Inscription sur le site blabla', $message);
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

      public function connectUser($login, $password){ //connecte l'utilisateur si son login et password sont valides, retourne l'utilisateur connecté
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
         $this->userOnline = $oneUser;
         return $oneUser;
      }

      public function getUsers() //retounre tous les utilisateur dans la bdd
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
