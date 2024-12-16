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
        //         'name' => 'Admin User',
        //         'password' => Hash::make(12345678), // Always hash passwords
        //         'role' => 'admin',
        //         'created_by' => null,
        //         'updated_by' => null,
        //     ],
        //     [
        //         'email' => 'employee@example.com',
        //         'name' => 'Employee User',
        //         'password' => Hash::make(12345678),
        //         'role' => 'employee',
        //         'created_by' => null,
        //         'updated_by' => null,
        //     ],
        //     [
        //         'email' => 'client@example.com',
        //         'name' => 'Client User',
        //         'password' => Hash::make(12345678),
        //         'role' => 'client',
        //         'created_by' => null,
        //         'updated_by' => null,
        //     ],
        // ];

        // foreach ($users as $user) {
        //     User::updateOrCreate(
        //         ['email' => $user['email']],
        //         [
        //             'name' => $user['name'],
        //             'password' => $user['password'],
        //             'role' => $user['role'],
        //             'created_by' => $user['created_by'],
        //             'updated_by' => $user['updated_by'],
        //         ]
        //     );
        // }

        $this->createOrUpdate([
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'admin',
            'created_by' => null,
            'updated_by' => null,
        ]);

        $this->createOrUpdate([
            'id' => Str::uuid(),
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'employee',
            'created_by' => null,
            'updated_by' => null,
        ]);

        $this->createOrUpdate([
            'id' => Str::uuid(),
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'client',
            'created_by' => null,
            'updated_by' => null,
        ]);
    }

    private function createOrUpdate(array $data)
    {
        DB::table('users')->updateOrInsert(
            ['email' => $data['email']], // Match based on email
            array_merge($data, ['updated_at' => now()])
        );
    }
    
}
