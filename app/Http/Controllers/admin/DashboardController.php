<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = auth()->user()->id;

        return view('admin.pages.dashboard',[
            'title' => 'Dashboard',
            'auth' => User::find($auth)
        ]);
    }
}
