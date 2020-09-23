<?php

namespace App\Http\Controllers;

use App\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * the service to consume author microservice
     *
     * @var AuthorService
     */
    public $authorService;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }
    /**
     * return all Authors list function
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }
    /**
     * Store Author function
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthors($request->all(),Response::HTTP_CREATED));
       
    }
    /**
     * show single author function
     *
     * @param [type] $author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * update author function
     *
     * @param Request $request
     * @param [type] $author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(),$author));

    }
    /**
     * Undocumented function
     *
     * @param [type] $author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }

}