<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request)
    {
        // Send email verification notification
        $request->user()->sendEmailVerificationNotification();

        // Return a response indicating successful notification
        return response()->json(['message' => 'Email verification link sent']);
    }
}
