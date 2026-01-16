<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Auth;

class authController extends Controller
{
    public function login(Request $request){


        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
            $user = user::where('email', $validated['email'])->first();
            return response()->json([
                'status' => 'success',
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $user->createToken('token')->plainTextToken
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

    }


    public function createUser(Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = user::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'token' => $user->createToken('token')->plainTextToken
        ]);

    }

    public function logout(Request $request)
    {
        // Elimina el token de acceso actual del usuario
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Cerró sesión exitosamente'], 200);
    }

}
