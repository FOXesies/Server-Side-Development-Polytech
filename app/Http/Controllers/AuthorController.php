<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infrastructure\Persistence\EloquentAuthorRepository;

class AuthorController extends Controller
{
    public function __construct(private EloquentAuthorRepository $repository) {}

    public function index()
    {
        $authors = $this->repository->getAll();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'gender' => 'required|in:Мужской,Женский',
            'birth_date' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:authors',
            'comment' => 'nullable|string',
        ]);

        $this->repository->save($validated);
        return redirect()->route('authors.index')->with('success', 'Автор зарегистрирован');
    }

    public function edit($id)
    {
        $author = $this->repository->findById($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'gender' => 'required|in:Мужской,Женский',
            'birth_date' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:authors,email,'.$id,
            'comment' => 'nullable|string',
        ]);

        $this->repository->update($id, $validated);
        return redirect()->route('authors.index')->with('success', 'Данные автора обновлены');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('authors.index')->with('success', 'Автор удален');
    }
}