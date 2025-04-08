<?php
class ConnexionBD {
    private static $_dbname="platforme_db";
    private static $_user="root";
    private static $pwd="newpassword";
    private static $_host="localhost";
    private static $_instance=null;

    private function __construct()
    {
        try
        {
            self::$_instance=new PDO('mysql:host=localhost;dbname=platforme_db','root','newpassword');
        }catch (PDOException $e){
            die('ERREUR :' .$e->getMessage());
        }
    }
    public static function getInstance():?PDO
    {
        if (!self::$_instance){
            new ConnexionBD();
        }
        return (self::$_instance);
    }
}

?>