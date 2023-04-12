<?php

use App\Models\User;
use App\Models\ApiKeys;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Api\V1\UserController;

Route::get('/' , function() {return 'ApiKey::all()';});

Route::get('/new_app' , function() {
        $api = ApiKeys::create(['for_app' =>'PSTMAN','api_key'=>  'A'. Str::random(30)]);
    return response()->json(['APP' =>$api->for_app , 'ApiKey' => $api->api_key]);
 });




Route::get('/login' , [UserController::class ,'login']);
Route::get('/testing' , function ()
{

        //     // إنشاء أذن جديدة
        // $permission = Spatie\Permission\Models\Permission::create(['name' => 'edit articles']);

        // // إنشاء دور جديد
        // $role = Spatie\Permission\Models\Role::create(['name' => 'writer']);

        // // تعيين الأذن الجديدة للدور الجديد
        // $role->givePermissionTo($permission);

        // // تعيين الدور الجديد للمستخدم
        // $user = App\Models\User::find(1);
        // $user->with('permission')->syncPermissions([]);
        // $roles = [];
        // $user->assignRole('admin');

        //اضافه دور الى الصلاحية
            // $role = Role::find(1);
            // $permission = Permission::find(1);
            // $role->givePermissionTo(1);
            // $role->givePermissionTo($permission);

        // اضافه دور للمستخدم
            // $user = User::find(1);
            // $role = Role::find(2);
            // $user->assignRole($role);

        // اضافه صلاحية للمستخدم
        // $user = User::find($user_id);
        // $permission = Permission::find($permission_id);
        // $user->givePermissionTo($permission);

            $role = Role::find(1);
            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",1)
            ->get();

    return  $rolePermissions;
});
Route::post('/new_users' , [UserController::class ,'create_user']);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/get_users' , [UserController::class ,'getusers'])->middleware('CheckPermission:get_d');
});

