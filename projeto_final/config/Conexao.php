<?php
class Conexao
{

    static $con = null;
    public static function getConnection()
    {
        $ip = "sql203.epizy.com";
        $port = "3306";
        $user = "epiz_32128061";
        $pass = "62ykfFCNSFKXze";
        $db = "epiz_32128061_banco_projet	";

        if (!self::$con) {
            self::$con = new mysqli($ip, $user, $pass, $db, $port);
            self::$con->set_charset("utf8mb4");
            if (self::$con->connect_error) {
                echo self::$con->connect_error;
                die();
            }
        }
        return self::$con;
    }
}
