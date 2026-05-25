<?php

namespace App\Application\Post\Queries;

use App\Infrastructure\Persistence\EloquentPostRepository;

class GetFeedQuery
{
    public function __construct(private EloquentPostRepository $repository) {}

    public function execute(?int $authorId = null): array
    {
        return $this->repository->getLatestPosts($authorId);
    }
}