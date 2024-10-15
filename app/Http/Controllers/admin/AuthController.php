<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return response()->json([
            'message' => 'Data User berhasil diambil',
            'data' => $user
        ]);
    }

    public function loginView()
    {
        return view('admin.auth.login',[
            'title' => 'Login',
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::where('email', $request->email)
            ->orWhere('username', $request->email)->first();

        if ($user &&  Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('authToken')->plainTextToken;

            return view('admin.pages.dashboard',[
                'title' => 'Dashboard',
                'token' => $token
            ]);
        } elseif (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'error' => 'Email atau Password Salah'
            ], 401);
        }
    }
}
