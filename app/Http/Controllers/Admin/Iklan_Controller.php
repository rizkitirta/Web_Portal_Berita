<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Iklan_Controller extends Controller
{
    public function index()
    {

        $title = 'Manage Ads';
        return view('admin.iklan.index', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        DB::table('iklan')->truncate();
        if ($file) {
            $destinationPath = 'upload';
            $file->move($destinationPath, $file->getClientOriginalName());

            DB::table('iklan')->insert([
                'url' => $request->url,
                'gambar' => $file->getClientOriginalName(),
            ]);
        }

        return back()->with('success', 'Iklan Berhasil Ditambahkan!');
    }
}
