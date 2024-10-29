<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the user by email
        $user = User::where('email', 'dev@hashedsystem.com')->first();

        if ($user) {
            // If the user exists, update the password
            $user->password = Hash::make('hs@visitharam');
            $user->save();
        } else {
            // If the user doesn't exist, create a new one
            $user = new User();
            $user->name = 'Admin';
            $user->email = 'dev@hashedsystem.com';
            $user->password = Hash::make('hs@visitharam');
            $user->save();

            // Attach the admin role
            $role = Role::where('name', 'Admin')->first();
            if ($role) {
                $user->roles()->attach($role->id);
            }
        }
    }

}
