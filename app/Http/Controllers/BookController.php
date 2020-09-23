<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the books microservices
     *
     * @var BookService
     */
    public $bookService;

     /**
     * The service to consume the author microservices
     *
     * @var AuthorService
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * return all Books list function
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }
    /**
     * Store Book function
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);
        return $this->successResponse($this->bookService->createBook($request->all(),Response::HTTP_CREATED));
       
    }
    /**
     * show single book function
     *
     * @param [type] $book
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * update book function
     *
     * @param Request $request
     * @param [type] $book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(),$book));

    }
    /**
     * Undocumented function
     *
     * @param [type] $book
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }

}