<?php 

namespace App\Tests;

use PDO;
use PHPUnit\DbUnit\TestCase;
use App\Services\BookService;
use PHPUnit\DbUnit\TestCaseTrait;

class BookServiceTest extends TestCase
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
                self::$pdo = new PDO($GLOBALS['CONNECTION'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_NAME']);
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
    
    /**
     * Testing book creation method work from BookService
     *
     * @return void
     */
    public function testBookCreation()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('books'));

        (new BookService)->storeBook([
            'title'=>'testing title',
            'author'=>'testing author',
            'release_date'=>'2021-08-14', 
            'isbn'=>'a12342'
        ]);

        $this->assertEquals(3, $this->getConnection()->getRowCount('books'));
  
    }
}