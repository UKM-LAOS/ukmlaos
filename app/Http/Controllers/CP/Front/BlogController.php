<?php

namespace App\Http\Controllers\CP\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Divisi;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->kategori;

        $popularArticles = Blog::published()
            ->unggulan()
            ->with(['divisi', 'author'])
            ->latest()
            ->limit(3)
            ->get();

        $latestArticlesQuery = Blog::published()
            ->with(['divisi', 'author'])
            ->latest();

        if ($kategori && $kategori !== 'semua') {
            $latestArticlesQuery->byKategori($kategori);
        }

        $latestArticles = $latestArticlesQuery->paginate(9);

        $categoriesFromDb = Blog::published()
            ->select('kategori')
            ->distinct()
            ->pluck('kategori')
            ->toArray();

        $categories = collect([
            'semua' => 'Semua',
            'informasi' => 'Informasi',
            'tutorial' => 'Tutorial',
            'mitos-fakta' => 'Mitos dan Fakta',
            'tips-trik' => 'Tips dan Trik',
            'press-release' => 'Press Release',
        ])->merge(
            collect($categoriesFromDb)->mapWithKeys(function ($cat) {
                return [$cat => ucfirst(str_replace('-', ' ', $cat))];
            })
        )->unique();

        return view('pages.cp.front.blog.index', [
            'title' => 'Blog',
            'articles' => $latestArticles,
            'popularArticles' => $popularArticles,
            'activeKategori' => $kategori ?? 'semua',
            'categories' => $categories->toArray(),
        ]);
    }

    public function show(Blog $blog)
    {
        if ($blog->status !== 'published') {
            abort(404);
        }

        $blog->load(['divisi', 'author']);

        $relatedArticles = Blog::published()
            ->with(['divisi', 'author'])
            ->byKategori($blog->kategori)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->limit(3)
            ->get();

        $blog->increment('views');

        return view('pages.cp.front.blog.show', [
            'title' => $blog->judul,
            'article' => $blog,
            'relatedArticles' => $relatedArticles,
        ]);
    }

    public function byCategory($kategori)
    {
        $articles = Blog::published()
            ->with(['divisi', 'author'])
            ->byKategori($kategori)
            ->latest()
            ->paginate(9);

        return view('pages.cp.front.blog.category', [
            'title' => 'Artikel Kategori: ' . ucfirst(str_replace('-', ' ', $kategori)),
            'articles' => $articles,
            'kategori' => $kategori,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            return redirect()->route('cp.blog.index');
        }

        $articles = Blog::published()
            ->with(['divisi', 'author'])
            ->where(function ($q) use ($query) {
                $q->where('judul', 'like', "%{$query}%")
                  ->orWhere('konten', 'like', "%{$query}%")
                  ->orWhereHas('divisi', function ($divQ) use ($query) {
                      $divQ->where('nama', 'like', "%{$query}%");
                  });
            })
            ->latest()
            ->paginate(9);

        return view('pages.cp.front.blog.search', [
            'title' => 'Hasil Pencarian: ' . $query,
            'articles' => $articles,
            'query' => $query,
        ]);
    }
}
