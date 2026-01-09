<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,        // 1️⃣ roles first
            PermissionSeeder::class,  // 2️⃣ permissions depend on roles
            UserSeeder::class,        // 3️⃣ users depend on roles
        ]);
    }
}
