<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $userInputArr = $request->only('name', 'email');
            $userInputArr['password'] = Hash::make($request->password);
            $createUser = User::create($userInputArr);
            $token = $createUser->createToken('myApp')->plainTextToken;
            $responseArr['token'] = $token; 
            $responseArr['id'] = $createUser->id; 
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $responseArr['message'] = $th->getMessage();
        }
        return response()->json($responseArr);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password' => $request->password])){
            $user = $request->user();
            $responseArr['token'] = $user->createToken('myApp')->plainTextToken;
            $responseArr['id'] = $user->id; 
        }else{
            $responseArr['message'] = 'Invalid email & password';
        }
        return response()->json($responseArr);
            
    }
}
