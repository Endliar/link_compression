<?php

namespace services;

use models\Database;
use repositories\UrlRepository;

include "C:/xampp/htdocs/link-compression/repositories/UrlRepository.php";


class UrlService
{
    private UrlRepository $repo;

    public function __construct(Database $database)
    {
        $this->repo = new UrlRepository($database);
    }

    public function getAllLinks() : array {
        return $this->repo->getAll();
    }
}