<?php
namespace App\Http\Controllers\Api\V1;



class UserController
{
    public function getUser(int $idUser)
    {
        $user = User::find($idUser);

        return new \App\Http\Resources\V1\User($user);
    }
}
