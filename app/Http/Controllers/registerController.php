<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function create()
    {
        $data['name'] = 'pyae phyo khant';
        $data['email'] = 'pyae2020@gmail.com';
        $data['password'] = 'password';

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function get_users_under_age()
    {
        return User::where('age','<',18)->get();
    }


}
