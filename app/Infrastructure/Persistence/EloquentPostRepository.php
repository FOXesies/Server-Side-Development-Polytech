<?php

namespace App\Infrastructure\Persistence;

use App\Models\Post as EloquentPost;

class EloquentPostRepository
{
    public function getLatestPosts(?int $authorId = null): array
    {
        $query = EloquentPost::with('author')->orderBy('published_at', 'desc');

        if ($authorId !== null) {
            $query->where('author_id', $authorId);
        }

        return $query->get()->toArray();
    }

    public function save(array $data): void
    {
        EloquentPost::create([
            'author_id' => $data['author_id'],
            'content' => $data['content'],
            'published_at' => now(), // Время публикации устанавливается автоматически
        ]);
    }

    public function update(int $id, array $data): void
    {
        $post = EloquentPost::findOrFail($id);
        $post->update(['content' => $data['content']]);
    }

    public function delete(int $id): void
    {
        EloquentPost::destroy($id);
    }

    public function findById(int $id): array
    {
        return EloquentPost::findOrFail($id)->toArray();
    }
}