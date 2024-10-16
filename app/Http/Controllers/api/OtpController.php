<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendOtpRequest;
use App\Mail\VerifyEmail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function sendOtp(SendOtpRequest $request)
    {
        Otp::where('email', $request->email)->delete();

        $otp = random_int(1000, 9999);

        Mail::to($request->email)->send(new VerifyEmail($otp));

        Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expired_at' => Carbon::now()->addMinutes(5),
        ]);

        return response([
            'message' => 'Otp has been sent to your email',
        ], 200);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate;

        $otpData = Otp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (! $otpData) {
            return response([
                'message' => 'OTP Invalid',
            ], 404);
        }

        if (Carbon::now() > $otpData->expired_at) {
            return response([
                'message' => 'OTP has expired',
            ], 400);
        }

        User::where('email', $request->email)->update([
            'email_verified_at' => Carbon::now(),
        ]);

        return response([
            'message' => 'OTP Valid',
        ], 200);
    }

    public function verifyToken(Request $request)
    {
        $request->validate;

        $otpData = Otp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (! $otpData) {
            return response([
                'message' => 'OTP Invalid',
            ], 404);
        }

        if (Carbon::now() > $otpData->expired_at) {
            return response([
                'message' => 'OTP has expired',
            ], 400);
        }

        $resetToken = Str::random(60);

        Cache::put("password-reset-{$resetToken}", $request->email, now()->addMinutes(5));

        return response([
            'message' => 'OTP is valid',
            'reset_token' => $resetToken,
        ], 200);
    }
}
