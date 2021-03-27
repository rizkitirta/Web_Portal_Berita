<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard_Controller extends Controller
{
   
    public function index()
    {
        $title = 'Dashboard';
        $article = DB::table('article')->count();
        $user = DB::table('users')->count();
        $category = DB::table('categories')->count();
        $comment = DB::table('comments')->count();

        return view('admin.beranda.index', compact('article', 'title', 'user', 'category', 'comment'));

    }
}
