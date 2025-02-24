<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'ELK', 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => 2, 'kategori_kode' => 'FAS', 'kategori_nama' => 'Fashion'],
            ['kategori_id' => 3, 'kategori_kode' => 'KOS', 'kategori_nama' => 'Kosmetik'],
            ['kategori_id' => 4, 'kategori_kode' => 'OTM', 'kategori_nama' => 'Otomotif'],
            ['kategori_id' => 5, 'kategori_kode' => 'SNK', 'kategori_nama' => 'Snack']
        ];
        DB::table('m_kategori')->insert($data);
    }
}
