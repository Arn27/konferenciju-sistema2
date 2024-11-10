<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the roles to be inserted
        $roles = [
            ['name' => 'client'],
            ['name' => 'employee'],
            ['name' => 'admin'],
        ];

        // Insert roles into the roles table
        DB::table('roles')->insert($roles);
    }
}
