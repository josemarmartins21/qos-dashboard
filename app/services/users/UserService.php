<?php

namespace App\services\users;

use App\services\users\contracts\UserServiceInterface;
use Illuminate\Support\Facades\DB;

class UserService implements UserServiceInterface
{
    public function getAll(?string $search = '')
    {   

    $users = [];
        if (! $search) {
            $users = DB::table('users')
                        ->join(
                            'permissions', 
                            'permissions.id', 
                            '=', 
                            'users.permission_id'
                        )->select(
                            'users.id',
                            'users.name',
                            'users.email',
                            'permissions.name as permission',
                        )->paginate(5);
            return $users;            
             
        }

        $users = DB::table('users')
                        ->join(
                            'permissions', 
                            'permissions.id', 
                            '=', 
                            'users.permission_id'
                        )->select(
                            'users.id',
                            'users.name',
                            'users.email',
                            'permissions.name as permission',
                        )->where('users.name', 'Like', '%'. $search . '%')
                        ->paginate(5);   
        return $users;        
    }
}
