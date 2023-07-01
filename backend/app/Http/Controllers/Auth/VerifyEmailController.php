<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


class VerifyEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        // Verify the user's email
        if ($request->hasValidSignature()) {
            $user = $request->user();
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            // Return a response indicating successful email verification
            return response()->json(['message' => 'Email verified']);
        }

        // Return a response indicating invalid email verification link
        return response()->json(['message' => 'Invalid verification link'], 422);
    }
}
