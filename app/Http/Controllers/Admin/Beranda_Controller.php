<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Beranda_Controller extends Controller
{
    public function index()
    {
        $title = 'Beranda Admin';

        return view('admin.beranda.index',compact('title'));
    }
}
