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
