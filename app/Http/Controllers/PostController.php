<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\Post\Queries\GetFeedQuery;
use App\Infrastructure\Persistence\EloquentPostRepository;
use App\Infrastructure\Persistence\EloquentAuthorRepository;

class PostController extends Controller
{
    public function __construct(
        private EloquentPostRepository $postRepository,
        private EloquentAuthorRepository $authorRepository
    ) {}

    public function index(Request $request, GetFeedQuery $feedQuery, $authorId = null)
    {
        if ($authorId !== null) {
            $authorId = (int)$authorId;

            $authorExists = $this->authorRepository->findById($authorId); 

            if (!$authorExists) {
                abort(404, "Автор с ID = {$authorId} не найден в системе.");
            }

            $posts = $feedQuery->execute($authorId);

            if (empty($posts)) {
                abort(404, "У автора {$authorExists['last_name']} {$authorExists['first_name']} еще нет опубликованных записей.");
            }
        } else {
            $posts = $feedQuery->execute(null);
        }

        return view('posts.index', [
            'posts' => $posts,
            'isFiltered' => $authorId !== null
        ]);
    }

    public function create()
    {
        $authors = $this->authorRepository->getAll();
        return view('posts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|exists:authors,id',
            'content' => 'required|string',
        ]);

        $this->postRepository->save($validated);
        return redirect()->route('admin.posts.index')->with('success', 'Пост успешно добавлен!');
    }

    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(['content' => 'required|string']);
        $this->postRepository->update($id, $validated);
        return redirect()->route('admin.posts.index')->with('success', 'Пост обновлен');
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('admin.posts.index')->with('success', 'Пост удален');
    }
}