<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function create_user(UserRequest $request)
    {
        // $validated = $request->validated();
        // return Resp( $validated ,400);
        $user = User::create([
            'employee_code' => $request->employee_code,
            'name'=>  $request->name,
            'password' => Hash::make($request->password),
            'email'=>  '',
            'phone'=> '',
            'birthday'=> '',
            'date_hired'=> '',
            // 'national_id'=> '',
            // 'status'=> '',
            // 'date_to_resign'=> '',
            // 'position_id'   => '',
            // "department_id"=> '',
            // "branch_id"=> '',
        ]);
        if($user){
            return Resp($user);
        }else{
            $validated = $request->validated();
            return Resp( $validated ,400);
        }


    }
    public function getusers()
    {
        $user = User::all();
        return $user ;
    }

    public function login()
    {
        $credentials = request(['name', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


     public function refresh()
    {
        // return $this->respondWithToken(auth()->refresh());
    }
}
