<?php

namespace App\Domain\Post\Entities;

use DateTimeImmutable;

class Post 
{
    public function __construct(
        private ?int $id,
        private int $authorId,
        private string $content,
        private DateTimeImmutable $publishedAt
    ) {}

    public function getId(): ?int { return $this->id; }
    public function getContent(): string { return $this->content; }
    public function getPublishedAt(): DateTimeImmutable { return $this->publishedAt; }
    public function getAuthorId(): int { return $this->authorId; }
}