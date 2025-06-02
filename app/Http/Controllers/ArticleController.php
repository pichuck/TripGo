<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->get();
        return response()->json($articles);
    }

    /**
     * Menampilkan artikel berdasarkan ID.
     */
    public function show($id)
    {
        $article = Article::with('user')->findOrFail($id);
        return response()->json($article);
    }

    /**
     * Membuat artikel baru menggunakan Eloquent.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'location' => 'required|string',
            'tags' => 'required|string',
            'rating' => 'nullable|integer',
            'travel_duration' => 'nullable|integer',
            'tips_guide' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menggunakan Eloquent untuk insert artikel
        $articleData = $request->only([
            'title', 'content', 'location', 'tags', 'rating', 'travel_duration', 'tips_guide'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/articles');
            $articleData['image'] = $imagePath;
        }

        // Menambahkan user_id yang berasal dari authenticated user
        $articleData['user_id'] = Auth::id(); // Mengambil ID user yang sedang login

        // Insert artikel dengan Eloquent
        $article = Article::create($articleData);

        return response()->json($article, 201);
    }

    /**
     * Mengupdate artikel.
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return response()->json($article);
    }

    /**
     * Menghapus artikel.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['message' => 'Article deleted successfully']);
    }
}
