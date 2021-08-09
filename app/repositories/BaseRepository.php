<?php

namespace App\Repositories;

use App\Nucleus\App;
use PDO;

class BaseRepository
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Get the query builder instance
     *
     */
    public function __construct()
    {
        $this->pdo = App::get('database');
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            echo($e->getMessage());
            exit;
        }
    }
}
