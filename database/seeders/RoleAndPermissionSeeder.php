<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add product',
            'delete product',
            'edit product',
            'add category',
            'edit category',
            'only cashier'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        $ownerRole = Role::create(['name' => 'owner']);
        $staffRole = Role::create(['name' => 'staff']);
        $cashierRole = Role::create(['name' => 'cashier']);

        $ownerRole->givePermissionTo(Permission::all());
        $cashierRole->givePermissionTo('only cashier');
    }
}
