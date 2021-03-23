<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Comment_Controller extends Controller
{
    public function index()
    {
        $title = 'Manage Commentar';
        $comments = DB::table('comments')
        ->join('article','comments.article_id','=','article.article_id')
        ->select('article.judul','comments.comment_id','comments.nama','comments.email','comments.website','comments.isi','comments.created_at')
        ->get();
        return view('admin.comment.index',compact('title','comments'));
    }

    public function delete($comment_id)
    {
        DB::table('comments')->where('comment_id',$comment_id)->delete();
        return back()->with('success','Comment Berhasil Dihapus!');
    }
}
