<?php

namespace Supri\ETU\UNTAG\Config;

use Exception;
use PDO;

class Database
{
    private static ?\PDO $PDO = null;

    public static function getConnection(string $env = "test"): \PDO
    {
        if (self::$PDO == null){
            try {
                require_once __DIR__.'/../../config/databaseConfig.php';
                $option = [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                $config = databaseConfig();
                self::$PDO = new \PDO(
                    $config['database'][$env]['url'],
                    $config['database'][$env]['username'],
                    $config['database'][$env]['password'],
                    $option
                );

            }catch (Exception $exception){
                echo "Koneksi Gagal";
            }
        }
        return self::$PDO;
    }
    public static function beginTransaction(){
        self::$PDO->beginTransaction();
    }

    public static function commitTransaction(){
        self::$PDO->commit();
    }

    public static function rollbackTransaction(){
        self::$PDO->rollBack();
    }
}