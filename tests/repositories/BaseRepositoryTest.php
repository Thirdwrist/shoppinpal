<?php
namespace App\Tests;

use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use App\Repositories\BaseRepository;


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
     * Testing creating of books from book repository
     *
     * @return void
     */
    public function testBooksCreation()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('books'));

        (new BaseRepository())->insert('books', [
            'title'=>'testing title',
            'author'=>'testing author',
            'release_date'=>'2021-08-14', 
            'isbn'=>'a12342'
        ]);

        $this->assertEquals(3, $this->getConnection()->getRowCount('books'));
    }

    /**
     * Testing Selection of all books from bookRepository
     *
     * @return void
     */
    public function testSelectingAllBooks()
    {
        $data = (new BaseRepository())->selectAll('books');

        $dataSet = $this->getConnection()->getRowCount('books');
        $this->assertSame(count($data) , $dataSet);
    }

}