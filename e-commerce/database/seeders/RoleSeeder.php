<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin   = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $staff   = Role::firstOrCreate(['name' => 'staff']);

        $allPermissions = Permission::all();

        // Admin → all permissions
        $admin->permissions()->sync($allPermissions->pluck('id'));

        // Manager → product + category permissions
        $manager->permissions()->sync(
            Permission::where('name', 'LIKE', 'products.%')
                ->orWhere('name', 'LIKE', 'category.%')
                ->pluck('id')
        );

        // Staff → create only
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'category.create',
            ])->pluck('id')
        );
    }
}
