<?php

namespace app\model;

use \PDO;

class Conexao
{
    private static $instance;
    
    public static function getConexao()
    {
        if (!isset(self::$instance)):
            self::$instance = new PDO('mysql:host=localhost;dbname=crud_pdo;charset=utf8', 'root', 'admin123');
        endif;

        return self::$instance;
    }   
}
