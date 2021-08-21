<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\hash;


class AutenticacaoController extends Controller
{
    public function cadastrar(Request $request){
        
        $campos = $request->validate([
            'name'=> 'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $campos['name'],
            'email'=> $campos['email'],
            'password'=> bcrypt($campos['password']) 
        ]);

        $token = $user->createtoken('meuToken')->plainTextToken;

        $response = [
            'user'=> $user,
            'token'=> $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){
        
        $campos = $request->validate([
            
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        

        $user = User::where('email', $campos['email'])->first();

        if(!$user || !Hash::check($campos['password'], $user->password)){

            return $response = [
                'mensagem'=>'Email ou senha inválido!'
            ];
        }

        $token = $user->createToken('meutoken')->plainTextToken;
        
        $response = [
            'user'=> $user,
            'token'=> $token
        ];

        return response($response, 201);
    }
    
    public function logout(Request $request){

        if ($request->user()) { 
            $request->user()->tokens()->delete();
        }
       
        return [
            'mensagem'=> 'Deslogado!'
        ];
    }
}
