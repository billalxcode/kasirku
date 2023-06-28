<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $this->call([
            RoleAndPermissionSeeder::class
        ]);

        $ownerRole = Role::findByName('owner');
        $cashierRole = Role::findByName('cashier');

        $ownerUser = \App\Models\User::factory()->create([
            'username' => 'ownerx',
            'name' => 'Owner',
            'email' => 'owner@kasir.com',
        ]);
        
        $cashierUser = \App\Models\User::factory()->create([
            'username' => 'cashierx',
            'name' => 'Cashier',
            'email' => 'cashier@kasir.com',
        ]);

        $ownerUser->assignRole($ownerRole);
        $cashierUser->assignRole($cashierRole);
        
        $this->call([
            CategorySeeder::class,
            UnitSeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class,
            VoucherSeeder::class
        ]);
    }
}
