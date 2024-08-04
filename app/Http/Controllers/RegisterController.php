<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
 public function register(RegisterRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

       // Hash the password before saving it to the database for security
        $validatedData['password'] = Hash::make($validatedData['password']);



        // Create a new user in the database
        $user = User::create($validatedData);
      

     
    
        // Create an access token for the user
        $accessToken = $user->createToken('Access Token')->accessToken;
        // Return a JSON response with the user data and access token
        return response()->json([
            'user' => $user,
            'token' => $accessToken,
            'message' => 'User registered successfully' // Add a message to indicate successful registration
        ], 200);
    }}
