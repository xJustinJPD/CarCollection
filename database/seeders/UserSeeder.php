<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        // get admin role and later attach this role to a user
        $role_admin = Role::where('name', 'admin')->first();

        // get user role and later attach this role to a user
        $role_user = Role::where('name', 'user')->first();


        $admin = new User();
        $admin->name = 'Justin Perry Doyle';
        $admin->email = 'justinpd@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();

        // attach admin role
        $admin->roles()->attach($role_admin);



        $user = new User();
        $user->name = 'Sophie Roche';
        $user->email = 'sophieroche@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        // attach user role
        $user->roles()->attach($role_user);



    }

}