<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User_Controller extends Controller
{
    public function index()
    {
        $title = 'Data User';
        $users = DB::table('users')->get();

        return view('admin.user.index', compact('title', 'users'));
    }

    public function add()
    {
        $title = 'Add User';
        return view('admin.user.add', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect(route('user.index'))->with('success', 'User Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $title = 'Edit User';
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect(route('user.index'))->with('success', 'User Berhasil Diupdate');
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return back()->with('success','User Berhasi Dihapus');
    }
}
