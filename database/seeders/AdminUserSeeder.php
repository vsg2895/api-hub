<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userArray = [
            [
                'name' => 'Admin 1',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(), //Carbon instance
                'password' => Hash::make('$v5iZg$7Q98%'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'niklas.berg@gcm.se',
                'email_verified_at' => now(), //Carbon instance
                'password' => Hash::make('5Q1@a4ascpOC'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        User::insert($userArray);
    }
}
