<?php

namespace services;


use repositories\UrlRepository;

class LinkShortenerService
{
    private UrlRepository $repository;

    public function __construct(UrlRepository $repository)
    {
        $this->repository = $repository;
    }

    public function generateLink(string $url): void
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

    public function regenerateLinks(int $linkId, string $newUrl): void
    {
        $this->repository->update($linkId, $newUrl);
    }
}