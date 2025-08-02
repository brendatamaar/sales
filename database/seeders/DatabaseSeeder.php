<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Store
        DB::table('stores')->insert([
            'store_name' => 'Mitra10 Cibubur',
            'no_rekening_store' => '1234567890'
        ]);

        // Salper
        DB::table('salpers')->insert([
            'salper_name' => 'Testing'
        ]);

        // Product
        DB::table('products')->insert([
            'item_code' => '01',
            'item_name' => 'Test 1',
            'uom' => 'PCS',
            'harga' => 500000,
            'diskon' => 10,
            'harga_setelah_diskon' => 450000
        ]);

        // Customer
        DB::table('customers')->insert([
            'no_telp_customer' => '081234567890',
            'nama_customer' => 'Test Customer',
            'alamat_lengkap_customer' => 'Jl. Melati No. 10, Jakarta',
            'longitude' => 106.827153,
            'latitude' => -6.175110
        ]);

        // User
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'nama' => 'Admin User',
            'password' => bcrypt('123'),
            'jabatan' => 'Admin',
            'store_id' => 1
        ]);

        // Deals
        $dealId = DB::table('deals')->insertGetId([
            'stage' => 'Mapping',
            'deals_name' => 'Pengadaan Kabel Proyek A',
            'deal_size' => 450000,
            'tanggal_dibuat' => now(),
            'tanggal_berakhir' => now()->addDays(30),
            'store_id' => 1,
            'email' => 'admin@gmail.com',
            'salper_id' => 1,
            'no_telp_customer' => '081234567890',
            'notes' => 'Segera dikirim ke lokasi proyek.',
            'foto_upload' => null,
            'payment_term_condition' => 'Cash Before Delivery',
            'quotation_expired_date' => '30 Hari',
            'quotation_upload' => null,
            'receipt_upload' => null,
            'nomor_receipt' => null,
            'alasan_gagal' => null
        ]);

        // Deal Items
        DB::table('deal_items')->insert([
            'deals_id' => $dealId,
            'item_code' => '01',
            'qty' => 1,
            'harga_setelah_diskon' => 450000,
            'total_harga' => 450000
        ]);
    }
}
