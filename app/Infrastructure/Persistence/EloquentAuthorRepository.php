<?php

namespace App\Infrastructure\Persistence;

use App\Models\Author as EloquentAuthor;

class EloquentAuthorRepository
{
    public function getAll(): array
    {
        return EloquentAuthor::orderBy('last_name')->get()->toArray();
    }

    public function save(array $data): void
    {
        EloquentAuthor::create($data);
    }

    public function update(int $id, array $data): void
    {
        $author = EloquentAuthor::findOrFail($id);
        $author->update($data);
    }

    public function delete(int $id): void
    {
        EloquentAuthor::destroy($id);
    }

    public function findById(int $id): ?array
    {
        $author = EloquentAuthor::find($id);
        return $author ? $author->toArray() : null;
    }
}