<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\InternalErrorException;
use App\Http\Requests\Users\Signup\SignupRequest;


class UserController extends Controller
{

    public function register(SignupRequest $request){
        $params = $request->validated();
        $params['password'] = Hash::make($params['password']);
        try
        {
            // DB::beginTransaction();
            DB::table('users')->insert($params);
            return "Register Success";
        }catch(\Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollBack();
        }
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if(!Auth::attempt($credentials))
        {
            return response()->json('Login Failed', 401);
        }

        return response()->json([
            'message' => 'Login success',
            'data' => $user,
            'auth' => Auth::user(),
            'token' => $user->createToken('token_id')->plainTextToken,
        ]);
    }



}
