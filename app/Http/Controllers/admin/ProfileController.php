<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
//        $user = User::find(1);

        return view('admin.pages.profile.index',[
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user = User::find(auth()->user()->id);
//        $user = User::find(1);

        return view('admin.pages.profile.edit',[
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->route('admin.profile.index')->with('success', 'Data berhasil diubah');
    }
}
