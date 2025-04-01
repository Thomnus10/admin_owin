<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'role_name' => 'admin'],
            ['id' => 2, 'role_name' => 'owner'],
            ['id' => 3, 'role_name' => 'cashier'],
        ]);
    }
}
