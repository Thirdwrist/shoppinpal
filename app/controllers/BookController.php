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

    public function index()
    {
        $data = $this->bookService->getBooks();

        return $this->response(200, 'Fetched all books', $data);
    }

    /**
     * Create new book in application
     *
     * @return string
     */
    public function store()
    {
        $this->validate([
            'title'=>['required', 'string'], 
            'author'=>['required', 'string'],
            'release_date'=>['required', 'date'],
            'isbn'=>['required', 'integer']
        ]);

        $this->bookService->storeBook(Request::all());

        return $this->response(201, 'Created book resource successfully');
    }

    /**
     * Create new book in application
     * 
     * @param integer $bookId
     * @return string
     */
    public function show(int $bookId)
    {

    }

    /**
     * Update book on application
     *
     * @param integer $bookId
     * @return string
     */
    public function update(int $bookId)
    {

    }

    /**
     * Delete book from application
     *
     * @param integer $bookId
     * @return string
     */
    public function delete(int $bookId)
    {

    }
}