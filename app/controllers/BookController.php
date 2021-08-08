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

    public function store()
    {
        $this->validate([
            'book'=>['required', 'pdf'],
            'title'=>['required', 'string'], 
            'author'=>['required', 'string'],
            'release_date'=>['required', 'date'],
            'isbn'=>['required', 'integer']
        ]);

        $book = $this->bookService->storeBook(Request::all());

        return $this->response(201, 'Created book resource successfully', $book);
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}