<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'password' => 'required|string|min:6|confirmed', // Password should have at least 6 characters
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400); // Return validation errors with 400 status
        }

        // Create new user if validation passes
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password before saving
        ]);

        // Return success response
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
}
