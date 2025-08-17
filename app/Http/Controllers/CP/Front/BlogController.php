<?php

namespace App\Http\Controllers\CP\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
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
                    $catValue = $cat instanceof \App\Enums\CP\Blog\KategoriEnum ? $cat->value : $cat;
                    return [$catValue => ucfirst(str_replace('-', ' ', $catValue))];
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

    public function storeComment(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'approved' => false,
        ]);

        if (auth()->check()) {
            $comment->user_id = auth()->id();
        }

        $blog->comments()->save($comment);

        if ($request->remember) {
            return back()
                ->with('success', 'Komentar Anda telah dikirim dan menunggu persetujuan.')
                ->cookie('comment_name', $request->name, 60 * 24 * 30)
                ->cookie('comment_email', $request->email, 60 * 24 * 30);
        }

        return back()->with('success', 'Komentar Anda telah dikirim dan menunggu persetujuan.');
    }
}
