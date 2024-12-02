<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('admin.pages.user.list',[
            'title' => 'List User',
            'no' => 1,
            'user' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.pages.user.detail',[
            'title' => 'Detail User',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.list')->with('success', 'Data berhasil dihapus');
    }
}
