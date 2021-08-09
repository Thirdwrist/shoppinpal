<?php

namespace App\Services;

use App\Nucleus\App;
use App\Repositories\BookRepository;

class BookService extends BaseService{
    
    /**
     * Book repository
     *
     * @var BookRepository
     */
    protected $bookRepository;

    /**
     * DB name
     *
     * @var string
     */
    protected $db;

    public function __construct()
    {
        $this->bookRepository = new BookRepository;
        $this->db = App::get('config')['database']['name'];
    }

    /**
     * Business logic to process and store books
     *
     * @param array $data
     * @return array
     */
    public function storeBook(array $data)
    {
        $this->bookRepository->insert( $this->db.'.books', [
            'title'=>$data['title'], 
            'author'=>$data['author'], 
            'release_date'=> $data['release_date'],
            'isbn'=> $data['isbn']
        ]);

        return; 
    }

    /**
     * Business logic to process and update book
     *
     * @param integer $bookId
     * @param array $data
     * @return bool
     */
    public function updateBook(int $bookId, array $data)
    {
        return;
    }

    /**
     * Business Logic to delete book
     *
     * @param integer $bookId
     * @return bool
     */
    public function deleteBook(int $bookId)
    {
        return;
    }

    /**
     * Get all books in the system
     *
     * @return array
     */
    public function getBooks()
    {
        return $this->bookRepository->selectAll($this->db.'.books');
    }

    /**
     * Get a single book
     *
     * @param integer $bookId
     * @return array
     */
    public function getBook(int $bookId)
    {
        return;
    }
}