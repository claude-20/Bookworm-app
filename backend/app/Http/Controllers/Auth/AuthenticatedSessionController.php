<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // The user is authenticated
            $user = Auth::user();

            // Generate a token for the user
            $token = $user->createToken('authToken')->plainTextToken;

            // Return a response with the user and token
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        }

        // Authentication failed
        throw ValidationException::withMessages([
            'email' => 'Invalid credentials',
        ]);
    }

    public function destroy(Request $request)
    {
        // Revoke all tokens for the authenticated user
        $request->user()->tokens()->delete();

        // Perform logout
        Auth::logout();

        // Return a response indicating successful logout
        return response()->json(['message' => 'Logged out successfully']);
    }
}
