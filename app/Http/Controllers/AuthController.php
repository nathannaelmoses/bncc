<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $email = $request->input("email");
        $password = $request->input("password");
        if (!$email || !$password) {
            return response()->json(['error' => 'Missing fields'], 400);
        }
        DB::insert("INSERT INTO users (Username, Password) VALUES (?, ?)", [
            $request->input("email"),
            $request->input("password"),
        ]);

        return response()->json(['message' => 'User registered successfully!'], 201);
    }
}
