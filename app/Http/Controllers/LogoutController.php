<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;

class LogoutController extends Controller
{
 public function logout(Request $request)
    {
      // Deleting all tokens associated with the authenticated user
       $request->user()->tokens()->delete();

      // Returning a JSON response with a success message
            return response()->json([
                 'message' => 'You have been successfully logged out' // Success message
                            ], 200);


    }}
