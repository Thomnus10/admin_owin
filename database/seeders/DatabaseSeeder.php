<?php

namespace Database\Seeders;

use App\Models\User; // Corrected model name
use App\Models\Role; // Import the Role model
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure roles exist before assigning them
        $this->call(RolesSeeder::class);

        // Create an admin user and assign the "admin" role
        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => Hash::make('admin'), // Securely hash the password
            'email' => 'admin@email.com',
            'role_id' => 1, // Assuming role_id exists in the users table
        ]);
    }
}
