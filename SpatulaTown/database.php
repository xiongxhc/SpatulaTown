<?php
class Database
{
    private static $dbName = 'hangchenx' ;
    private static $dbHost = 'info20003db.eng.unimelb.edu.au' ;
    private static $dbUsername = 'hangchenx';
    private static $dbUserPassword = 'hangchenx_2016';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>