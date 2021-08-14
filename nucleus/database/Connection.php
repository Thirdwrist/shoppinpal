<?php

namespace App\Nucleus\Database;

use PDO;
use PDOException;

class Connection
{
    /**
     * Create a new PDO connection.
     *
     * @param array $config
     */
    public static function make($config)
    {
        try {

            // Switch to test DB while running unit tests
            if($GLOBALS['ENV'] === 'testing')
            {
                return new PDO(
                    $GLOBALS['CONNECTION'].';dbname='.$GLOBALS['DB_NAME'],
                    $GLOBALS['DB_USER'],
                    $GLOBALS['DB_PASS'],
                    $GLOBALS['OPTIONS']
                );
            }
            
            return new PDO(
                $config['CONNECTION'].';dbname='.$config['DB_NAME'],
                $config['DB_USER'],
                $config['DB_PASS'],
                $config['OPTIONS']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
