<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert Store
        $storeId = Store::create([
            'store_name' => 'Mitra10 Jakarta',
            'no_rekening_store' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('1234'),
            'jabatan' => 'Admin',
            'store_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234'),
            'jabatan' => 'Admin',
            'store_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $admin->assignRole('Admin');

    }
}