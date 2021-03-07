<?php

namespace App\Http\Controllers\Api;
use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $cred = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if(auth()->attempt($cred)){
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        }
    }
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('TutsForWeb')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
    public function logout(Request $request){
        try{
            return response()->json([
                'success' => true,
                'message' => 'logout success',
            ]);
        }catch(Exception $e){
            return response() -> json([
                'success' => false,
                'message' => ''.$e,
            ]);
        }
    }
}
