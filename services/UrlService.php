<?php

namespace services;

use models\Database;
use repositories\UrlRepository;

include "C:/xampp/htdocs/link compression/repositories/UrlRepository.php";


class UrlService
{
    public UrlRepository $repo;

    public function __construct()
    {
        $this->repo = new UrlRepository();
    }

    public function getAllLinks() : array {
        return $this->repo->getAll();
    }
}