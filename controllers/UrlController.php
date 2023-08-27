<?php

namespace controllers;

use repositories\UrlRepository;
use services\UrlService;
use UrlView;

include "C:/xampp/htdocs/link compression/services/UrlService.php";
include "C:/xampp/htdocs/link compression/views/UrlView.php";

class UrlController
{
    private UrlService $urlService;
    private UrlView $urlView;

    public function __construct()
    {
        $this->urlService = new UrlService();
        $this->urlView = new UrlView();
    }

    public function indexAction(): string {
        $links = $this->urlService->getAllLinks();
        return $this->urlView->renderIndex($links);
    }
}