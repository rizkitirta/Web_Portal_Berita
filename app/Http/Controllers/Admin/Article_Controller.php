<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class Article_Controller extends Controller
{
    public function index()
    {
        $title = 'List Article';
        $articles = DB::table('article')
            ->join('users', 'article.user_id', '=', 'users.id')
            ->join('categories', 'article.category_id', '=', 'categories.id')
            ->select('article.article_id', 'article.judul','article.gambar','article.created_at', 'users.name', 'categories.nama')
            ->where('article.user_id', \Auth::user()->id)
            ->orderBy('nama', 'desc')
            ->get();

        return view('admin.article.index', compact('title', 'articles'));
    }
    public function add()
    {
        $title = 'Create Article';
        $categories = DB::table('categories')->orderBy('nama', 'desc')->get();

        return view('admin.article.add', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'image'=> 'max:2048'
        ]);

        $file = $request->file('image');
        if ($file) {
            $data['category_id'] = $request->category_id;
            $data['judul'] = $request->judul;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $destinationPath = 'upload';
            $file->move($destinationPath, $file->getClientOriginalName());
            $data['gambar'] = $file->getClientOriginalName();

        } else {
            $data['category_id'] = $request->category_id;
            $data['judul'] = $request->judul;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        DB::table('article')->insert($data);
        \Session::flash('success', 'Article Berhasil Ditambahkan!');
        return redirect(route('article.index'));
    }

    public function edit($article_id)
    {
        $title = 'Edit Article';
        $categories = DB::table('categories')->get();
        $articles = DB::table('article')->where('article_id', $article_id)->first();

        return view('admin.article.edit', compact('title', 'categories', 'articles'));
    }

    public function update(Request $request, $article_id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'isi' => 'required',
        ]);

        $file = $request->file('image');
        if ($file) {
            $data['judul'] = $request->judul;
            $data['category_id'] = $request->category_id;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');

            $destinationPath = 'upload';
            $file->move($destinationPath, $file->getClientOriginalName());
            $data['gambar'] = $file->getClientOriginalName();
        } else {
            $data['judul'] = $request->judul;
            $data['category_id'] = $request->category_id;
            $data['isi'] = $request->isi;
            $data['user_id'] = \Auth::user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        DB::table('article')->where('article_id', $article_id)->update($data);
        return redirect(route('article.index'))
            ->with('success', 'Article Berhasil Diupdate!');
    }

    public function delete($article_id)
    {
        DB::table('article')->where('article_id',$article_id)->delete();
        return back()->with('success', 'Article Berhasil Dihapus!');
    }
}
