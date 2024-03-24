<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name'=> 'Admin',
            'username' => 'admin',
            'password' => Hash::make('123123'),
            'role'=> 'admin',
        ]);
        User::create([
            'name'=> 'User',
            'username' => 'user',
            'password' => Hash::make('123123'),
            'role'=> 'user',
        ]);
    }
}
