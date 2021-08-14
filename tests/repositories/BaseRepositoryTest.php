<?php
namespace App\Tests;

use App\Repositories\BaseRepository;
use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use App\Nucleus\App;

class BaseRepositoryTest extends TestCase
{
    use TestCaseTrait;


       // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    protected $backupGlobals = FALSE;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
         if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createXMLDataSet(dirname(__FILE__).'/../datasets/books.xml');
    }

    public function testBooks()
    {
        $repo = (new BaseRepository())->insert('hub.books', [
            'title'=>'testing title',
            'author'=>'testing author',
            'release_date'=>'2021-08-14', 
            'isbn'=>'a12342'
        ]);

        $data = $this->getConnection()->createQueryTable('books', "SELECT * FROM books");
        $this->assertTablesEqual($repo, $data);
    }

    public function testConfig()
    {
        $this->assertIsArray(APP::get('config'));
    }


}