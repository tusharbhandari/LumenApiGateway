<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    /**
     * the base url to consume the author service
     *
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET','/books');
    }

    public function createBook($data)
    {
        return $this->performRequest('POST','/books',$data);
    }

    public function obtainBook($author)
    {
        return $this->performRequest('GET',"/books/{$author}");
    }

    public function editBook($data,$author)
    {
        return $this->performRequest('PUT',"/books/{$author}",$data);
    }

    public function deleteBook($author)
    {
        return $this->performRequest('DELETE',"/books/{$author}");
    }

}
