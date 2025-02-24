<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'ELK001', 'barang_nama' => 'Laptop', 'harga_beli' => 8000000, 'harga_jual' => 9500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'ELK002', 'barang_nama' => 'Smartphone', 'harga_beli' => 4000000, 'harga_jual' => 4500000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'FAS001', 'barang_nama' => 'Kemeja', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'FAS002', 'barang_nama' => 'Celana', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'KOS001', 'barang_nama' => 'Lipstik', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'KOS002', 'barang_nama' => 'Bedak', 'harga_beli' => 30000, 'harga_jual' => 50000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'OTM001', 'barang_nama' => 'Oli', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'OTM002', 'barang_nama' => 'Busi', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'SNK001', 'barang_nama' => 'Chitato', 'harga_beli' => 5000, 'harga_jual' => 7500],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'SNK002', 'barang_nama' => 'Taro', 'harga_beli' => 4000, 'harga_jual' => 6000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
