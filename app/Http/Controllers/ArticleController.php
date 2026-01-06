<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * List articles.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Article creation form.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Save article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body'  => 'required|min:10',
        ]);

        Article::create($request->only('title', 'body'));

        return redirect()->route('articles.index')
            ->with('status', '✅ Article created successfully!');
    }

    /**
     * Show an article.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Article edit form.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update article.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body'  => 'required|min:10',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->only('title', 'body'));

        return redirect()->route('articles.index')
            ->with('status', '✅ Article updated!');
    }

    /**
     * Delete article.
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->route('articles.index')
            ->with('status', '🗑️ Article deleted.');
    }
}
