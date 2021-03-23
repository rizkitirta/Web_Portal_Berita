<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Beranda_Controller extends Controller
{
    public function view()
    {
        $articles = \DB::table('article')
            ->join('categories', 'article.category_id', '=', 'categories.id')
            ->select('article.article_id', 'article.judul', 'article.isi', 'article.gambar', 'article.created_at', 'categories.nama')
            ->orderby('created_at', 'desc')
            ->paginate(5);

        return view('welcome', compact('articles'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $articles = \DB::table('article')
            ->join('categories', 'article.category_id', '=', 'categories.id')
            ->where('article.judul','like','%'.$search.'%')
            ->orWhere('article.isi','like','%'.$search.'%')
            ->select('article.article_id', 'article.judul', 'article.isi', 'article.gambar', 'article.created_at', 'categories.nama')
            ->orderby('created_at', 'desc')
            ->paginate();

            return view('welcome',compact('articles'));

    }

    public function index()
    {
        $title = 'Beranda Admin';

        return view('admin.beranda.index', compact('title'));
    }

    public function detail($article_id)
    {
        $article = DB::table('article')->where('article_id', $article_id)
            ->join('users', 'article.user_id', '=', 'users.id')
            ->first();
        $comments = DB::table('comments')->where('article_id', $article_id)->get();
        $totalComments = DB::table('comments')->where('article_id', $article_id)->count();

        return view('detail', compact('article', 'comments', 'totalComments'));
    }

    public function comments(Request $request, $article_id)
    {
        DB::table('comments')->insert([
            'article_id' => $request->article_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'website' => $request->website,
            'isi' => $request->isi,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('beranda.detail', $article_id));
    }

    public function category($id)
    {
        $articles = \DB::table('article')
            ->join('categories', 'article.category_id', '=', 'categories.id')
            ->select('article.article_id', 'article.judul', 'article.isi', 'article.gambar', 'article.created_at', 'categories.nama')
            ->orderby('created_at', 'desc')
            ->where('category_id', $id)
            ->get();
        return View('category', compact('articles'));
    }
}
