<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category_Controller extends Controller
{
    public function index()
    {
        $title = 'Category Admin';
        $categories = DB::table('categories')
            ->join('users', 'categories.user_id', '=', 'users.id')
            ->select('categories.id', 'categories.nama', 'users.name', 'categories.created_at')
            ->get();

        return view('admin.category.index', compact('title', 'categories'));
    }

    public function add()
    {
        $title = 'Tambah Category';
        return view('admin.category.add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $nama = $request->nama;
        DB::table('categories')->insert([
            'nama' => $nama,
            'user_id' => \Auth::user()->id,
            'created_at' => date('Y-m-d H-i-s'),
            'updated_at' => date('Y-m-d H-i-s'),
        ]);

        return redirect(route('category.index'))->with('success','Category Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Category Edit';
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories', 'title'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $nama = $request->nama;
        DB::table('categories')
        ->where('id', $id)
        ->update([
            'nama' => $nama,
            'user_id' => \Auth::user()->id,
            'updated_at' => date('Y-m-d H-i-s'),
        ]);

        return redirect(route('category.index'));
    }

    public function delete($id)
    {
        DB::table('categories')
        ->where('id',$id)
        ->delete();

        return redirect(route('category.index'))->with('success','Category Berhasil Dihapus');
    }
}
