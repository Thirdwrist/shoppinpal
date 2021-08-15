<?php 

namespace App\Controllers;

use App\Nucleus\Request;
use App\Services\BookService;

/**
 * @OA\Info(title="ShoppinPal OpenAPI docs", version="1.0")
 */
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
     * @OA\Get(
     *     path="/api/books",
     *     tags={"Books"},
     *     summary="Get books",
     *     description="Returns a map of all books.",
     * )
     */
    public function index()
    {
        $data = $this->bookService->getBooks();

        return $this->response(200, 'Fetched all books', $data);
    }

     /**
     * @OA\Post (
     *     path="/api/books",
     *     tags={"Books"},
     *     summary="Create Book",
     *     description="Accepts json body to create a new book",
     *     @OA\Response(
     *         response=201,
     *          description="Created book resource successfully",
     *          @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=400,
     *          description="Validation error"
     *     ),
     * @OA\RequestBody(
     *    required=true,
     *    description="Post data to create new book",
     *    @OA\JsonContent(
     *       required={"title","author", "isbn"},
     *       @OA\Property(property="title", type="string", example="How to be a ShoppinPal Dev"),
     *       @OA\Property(property="author", type="string", example="Akunne Obinna"),
     *       @OA\Property(property="release_date", type="string", "2020-09-09"),
     *       @OA\Property(property="isbn", type="integer", example="1234466778"),
     *    )
     *  )
     * )
     */
    public function store()
    {
        $this->validate([
            'title'=>['required', 'string'], 
            'author'=>['required', 'string'],
            'release_date'=>['date'],
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