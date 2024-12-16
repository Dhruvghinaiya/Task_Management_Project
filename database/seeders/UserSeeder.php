<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [
        //     [
        //         'email' => 'admin@example.com',
        //         'id' => Str::uuid(),
        //         'name' => 'Admin User',
        //         'password' => Hash::make('password'), // Always hash passwords
        //         'role' => 'admin',
        //         'created_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'email' => 'employee@example.com',
        //         'id' => Str::uuid(),
        //         'name' => 'Employee User',
        //         'password' => Hash::make('password'),
        //         'role' => 'employee',
        //         'created_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'email' => 'client@example.com',
        //         'id' => Str::uuid(),
        //         'name' => 'Client User',
        //         'password' => Hash::make('password'),
        //         'role' => 'client',
        //         'created_by' => null,
        //         'updated_by' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ];

        // foreach ($users as $user) {
        //     User::updateOrCreate(
        //         ['email' => $user['email']], // Condition to check if the user exists
        //         $user // Attributes to update or create
        //         );
        //     }
        
        $users = [
            [
                'email' => 'admin@example.com',
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Always hash passwords
                'role' => 'admin',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'email' => 'employee@example.com',
                'name' => 'Employee User',
                'password' => Hash::make('password'),
                'role' => 'employee',
                'created_by' => null,
                'updated_by' => null,
            ],
            [
                'email' => 'client@example.com',
                'name' => 'Client User',
                'password' => Hash::make('password'),
                'role' => 'client',
                'created_by' => null,
                'updated_by' => null,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'role' => $user['role'],
                    'created_by' => $user['created_by'],
                    'updated_by' => $user['updated_by'],
                ]
            );
        }
    }
}
