<?php

use App\Models\User;
use App\Models\ApiKeys;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Hash;

Route::get('/' , function() {return 'ApiKey::all()';});

Route::get('/new_app' , function() {
        $api = ApiKeys::create(['for_app' =>'PSTMAN','api_key'=>  'A'. Str::random(30)]);
    return response()->json(['APP' =>$api->for_app , 'ApiKey' => $api->api_key]);
 });




Route::Post('/login' , [UserController::class ,'login']);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/get_users' , [UserController::class ,'getusers']);
    Route::post('/new_users' , [UserController::class ,'create_user']);
});

