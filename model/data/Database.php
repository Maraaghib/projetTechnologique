<?php
   include_once('User.php');

   /**
    * Singleton permettant de faire la connexion à la base de données une seule fois tout au long de l'application
    **/
   class Database {

      private static $config;
      private static $db;


      /**
      * Le constrcuteur avec sa logique est privé pour émpêcher l'instanciation en dehors de la classe
      **/
      private function __construct() {
      }

      /**
      * La méthode statique qui permet d'instancier ou de récupérer l'instance unique
      **/
      public static function getDBConnection() {
          if (is_null(self::$db)) {
              self::$config = parse_ini_file('../private/config.ini');

              try {
                 self::$db = new PDO('mysql:host=' . self::$config['db_hostname'] . '; dbname=' . self::$config['db_name'], self::$config['db_user'], self::$config['db_password']);
              } catch (PDOException $e) {
                 print "Connection failed : " . $e->getMessage() . "<br/>";
              }
          }

          return self::$db;
      }


      public static function getDBConnection2() {
          if (is_null(self::$db)) {
              self::$config = parse_ini_file('../../private/config.ini');

              try {
                 self::$db = new PDO('mysql:host=' . self::$config['db_hostname'] . '; dbname=' . self::$config['db_name'], self::$config['db_user'], self::$config['db_password']);
              } catch (PDOException $e) {
                 print "Connection failed : " . $e->getMessage() . "<br/>";
              }
          }

          return self::$db;
      }
   }

?>
