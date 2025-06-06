<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
    public function register(RegistroRequest $request){
        $data = $request->validated(); //envia a rules()

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];

    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        //veriricar si las credenciales son correctas
        if(!Auth::attempt($data)){
            return response([
                'errors' => ['Email o contraseña incorrectos']
            ], 422); //para lanzar un error y poder verlo en consola en el front 
        }

        //Generar token
        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];

    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return [ 'user' => null ];
    }
}

