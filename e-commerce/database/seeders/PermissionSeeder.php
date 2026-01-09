<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Create permissions
        $permissions = [
            'users.manage',

            'products.create',
            'products.update',
            'products.delete',

            'category.create',
            'category.update',
            'category.delete',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 2️⃣ Fetch roles (THIS WAS MISSING)
        $admin   = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();
        $staff   = Role::where('name', 'staff')->first();

        // 3️⃣ Safety check (optional but good)
        if (!$admin || !$manager || !$staff) {
            throw new \Exception('Roles not found. Run RoleSeeder first.');
        }

        // 4️⃣ Attach permissions

        // Admin → all permissions
        $admin->permissions()->sync(
            Permission::all()->pluck('id')
        );

        // Manager → product & category permissions
        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'products.update',
                'products.delete',
                'category.create',
                'category.update',
                'category.delete',
            ])->pluck('id')
        );

        // Staff → NO permissions
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'categories.create',
            ])->pluck('id')
        );
    }
}
