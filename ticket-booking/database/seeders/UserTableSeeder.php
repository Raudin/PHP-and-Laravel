<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Create Roles 
        collect([
            ['name' => 'Admin'],
            ['name' => 'User'],
        ])->map(fn ($attributes) => Role::create($attributes));


        // Create Admin User
        User::where('email', 'admin@test.com')->firstOr(
            function () {
                return User::factory()->create([
                    'name' => 'Admin User',
                    'email' => 'admin@test.com',
                    'role_id' => Role::where('name', 'Admin')->first()->id,
                ]);
            }
        );

        // Create Normal User
        User::where('email', 'user@test.com')->firstOr(
            function () {
                return User::factory()->create([
                    'name' => 'Normal User',
                    'email' => 'user@test.com',
                    'role_id' => Role::where('name', 'User')->first()->id,

                ]);
            }
        );
    }
}
