<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WajibRetribusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wajib_retribusi')->insert([
            [
                'id' => 1,
                'id_user' => 2,
                'nama' => 'Avatar Rezqi',
                'no_hp' => '08387654567',
                'nik' => '76556776575',
                'alamat' => 'Jalan Harjamukti',
                'id_kelurahan' => 5,
                'status' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'id_user' => 3,
                'nama' => 'Fauzi Alfarisi',
                'no_hp' => '08644554535',
                'nik' => '12334433',
                'alamat' => 'Puskesmas Gn Jati',
                'id_kelurahan' => 10,
                'status' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
