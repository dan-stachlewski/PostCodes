<?php

class Database {
    //SET the dBase connection vars
    private static $dsn = 'mysql:host=localhost;dbname=postcodes';
    private static $username = 'root';
    private static $password = 'password';
    private static $db;

    private function __construct() {

    }//END private function __construct

    /**
     * Create a dBase connection by using a try catch stmnt
     * @return type $db connection
     */
    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }
        //echo "<h2>Database CONNECTED Successfully!</h2>";
        return self::$db;
    }//END public static function getDB

}//END class Database
