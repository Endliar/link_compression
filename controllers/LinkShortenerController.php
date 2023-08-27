<?php

namespace controllers;


use repositories\UrlRepository;

class LinkShortenerController
{
    private UrlRepository $repository;

    public function __construct(UrlRepository $repository) {
        $this->repository = $repository;
    }

    public function generateLink(int $url): void
    {
        $shortName = substr(md5(uniqid()), 0, 6);
        $shortLink = 'https://' . $_SERVER["HTTP_HOST"]. '/' . $shortName;

        $this->repository->create($shortLink, $url);
    }

    public function getAllLinks(): false|array
    {
        return $this->repository->getAll();
    }

    public function deleteLink($id): void
    {
        $this->repository->delete($id);
    }

    public function regenerateLinks(int $linkId, int $newUrl): void
    {
        $this->repository->update($linkId, $newUrl);
    }
}