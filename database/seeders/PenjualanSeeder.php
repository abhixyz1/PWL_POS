<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Cristiano Ronaldo', 'penjualan_kode' => 'A8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Lionel Messi', 'penjualan_kode' => 'B8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Neymar Jr', 'penjualan_kode' => 'C8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Kylian Mbappe', 'penjualan_kode' => 'D8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Mohamed Salah', 'penjualan_kode' => 'E8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Sadio Mane', 'penjualan_kode' => 'F8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Kevin De Bruyne', 'penjualan_kode' => 'G8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Robert Lewandowski', 'penjualan_kode' => 'H8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Karim Benzema', 'penjualan_kode' => 'I8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Sergio Ramos', 'penjualan_kode' => 'J8632ISAB9', 'penjualan_tanggal' => Carbon::now()],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
