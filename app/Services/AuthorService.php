<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
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
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET','/authors');
    }

    public function createAuthors($data)
    {
        return $this->performRequest('POST','/authors',$data);
    }

    public function obtainAuthor($author)
    {
        return $this->performRequest('GET',"/authors/{$author}");
    }

    public function editAuthor($data,$author)
    {
        return $this->performRequest('PUT',"/authors/{$author}",$data);
    }

    public function deleteAuthor($author)
    {
        return $this->performRequest('DELETE',"/authors/{$author}");
    }

}
