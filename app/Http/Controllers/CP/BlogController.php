<?php

namespace App\Http\Controllers\CP;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->kategori;
        
        $popularArticlesQuery = Article::whereIsUnggulan(true)->latest();
        $latestArticlesQuery = Article::latest();
        
        // Filter by category if provided
        if ($kategori && $kategori !== 'semua') {
            $latestArticlesQuery->where('kategori', $kategori);
        }
        
        $popularArticles = $popularArticlesQuery->limit(3)->get();
        $latestArticles = $latestArticlesQuery->paginate(9);
        
        return view('pages.cp.front.blog.index', [
            'title' => 'Blog',
            'articles' => $latestArticles,
            'popularArticles' => $popularArticles,
            'activeKategori' => $kategori ?? 'semua',
            'categories' => [
                'semua' => 'Semua',
                'informasi' => 'Informasi',
                'tutorial' => 'Tutorial',
                'mitos-fakta' => 'Mitos dan Fakta',
                'tips-trik' => 'Tips dan Trik',
                'press-release' => 'Press Release',
            ],
        ]);
    }

    public function show($slug)
    {
        $article = Article::with(['media', 'division'])->whereSlug($slug)->firstOrFail();
        return view('pages.cp.front.blog.show', [
            'title' => $article->judul,
            'article' => $article,
        ]);
    }
}
