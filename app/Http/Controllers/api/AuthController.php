<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Mail\VerifyEmail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'token' => $token,
            'data' => $user
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $user = User::where('email', $request->email)
            ->orWhere('username', $request->email)->first();

        if ($user &&  Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
            ], 200);
        } elseif (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'error' => 'Email atau Password Salah'
            ], 401);
        }
    }

    public function user()
    {
        $auth = auth()->user();

        if ($auth->email_verified_at == null) {
            return response()->json([
                'message' => 'Email belum terverifikasi'
            ], 401);
        }

        return response()->json(auth()->user());
    }

    public function show()
    {
        $user = User::all();
        return response()->json([
            'message' => 'List data user berhasil diambil',
            'users' => $user
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ], 200);
    }

    public function delete()
    {
        $user = User::find(auth()->user()->id);
        $user->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ], 200);
    }

    public function edit(EditRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update($request->all());

        return response()->json([
            'message' => 'User berhasil diupdate',
            'data' => $user
        ], 200);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'message' => 'Password berhasil diubah'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Password lama salah'
            ], 401);
        }
    }

    public function forgotPassword(Request $request)
    {
        $email = Cache::get("password-reset-{$request->token}");

        if (! $email || $email !== $request->email) {
            return response()->json([
                'message' => 'Invalid or expired token',
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Cache::forget("password-reset-{$request->token}");

        Otp::where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Password has been reset successfully',
        ], 200);
    }
}
