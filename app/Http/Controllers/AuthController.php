<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_post(Request $request)
    {
        // Basic validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email", // Ensure the email is unique
            "password" => "required|confirmed", // Check if passwords match
            "role_id" => "required"
        ]);

        // Create the user
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role_id" => $request->role_id
        ]);

        // Generate a Passport token for the user
        $token = $user->createToken('MyApp')->accessToken;

        // Return the response with the token
        return response()->json([
            "status" => true,
            "message" => "User registered successfully",
            "data" => [
                'token' => $token,
                'user' => $user->name,
                'email' => $user->email
            ]
        ]);
    }

    // Simplified login for Passport
    public function login_post(Request $request)
    {
        // Validate email and password fields
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If authentication is successful, get the authenticated user
            $user = Auth::user();

            // Prepare the token using Passport
            $token = $user->createToken('MyApp')->accessToken;

            // Prepare response data (similar to previous response)
            $response = [
                'token' => $token,
                'user' => $user->name,
                'email' => $user->email
            ];

            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully',
                'data' => $response
            ]);
        }

        // If authentication fails, return error response
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials or user not registered',
            'data' => null
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
    
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not authenticated',
            ], 401);
        }
    
        // Revoke the current access token
        $request->user()->token()->revoke();
    
        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
        ]);
    }
    
}
