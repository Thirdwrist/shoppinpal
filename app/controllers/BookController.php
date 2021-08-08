<?php 

namespace App\Controllers;

use App\Nucleus\Request;
use App\Services\BookService;

class BookController extends BaseController
{

    /**
     * BookService variable
     *
     * @var BookService
     */
    protected $bookService;

    /**
     * Constructor to import class dependencies
     */
    public function __construct()
    {
        $this->bookService = new BookService();   
    }

    /**
     * Create new book in application
     *
     * @return Json
     */
    public function store()
    {
        $this->validate([
            'title'=>['required', 'string'], 
            'author'=>['required', 'string'],
            'release_date'=>['required', 'date'],
            'isbn'=>['required', 'integer']
        ]);

        $book = $this->bookService->storeBook(Request::all());

        return $this->response(201, 'Created book resource successfully', $book);
    }

    /**
     * Create new book in application
     * 
     * @param integer $bookId
     * @return Json
     */
    public function show(int $bookId)
    {

    }

    /**
     * Update book on application
     *
     * @param integer $bookId
     * @return Json
     */
    public function update(int $bookId)
    {

    }

    /**
     * Delete book from application
     *
     * @param integer $bookId
     * @return Json
     */
    public function delete(int $bookId)
    {

    }
}