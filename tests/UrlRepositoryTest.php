<?php

use models\Database;
use PHPUnit\Framework\TestCase;
use repositories\UrlRepository;

class UrlRepositoryTest extends TestCase
{
    private $pdo;
    private $repository;

    public function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->repository = new UrlRepository(new Database($this->pdo));
    }

    public function testCreate() {
        $shortName = 'short';
        $url = 'https://example.com';

        $stmt = $this->createMock(PDOStatement::class);
        $this->pdo->expects($this->once())->method('prepare')->with('INSERT INTO urls (short_url, url) values (:short_name, :full_url)')->willReturn($stmt);
        $stmt->expects($this->once())->method('bindParam')->with(':short_name', $shortName);
        $stmt->expects($this->once())->method('bindParam')->with(':full_url', $url);
        $stmt->expects($this->once())->method('execute');

        $this->repository->create($shortName, $url);
    }
}
