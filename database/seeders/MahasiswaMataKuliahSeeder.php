<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mhsMatkul = [
            [
                'mahasiswa_id' => '1',
                'matakuliah_id' => '1',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matakuliah_id' => '2',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matakuliah_id' => '3',
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => '1',
                'matakuliah_id' => '4',
                'nilai' => 'A'
            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($mhsMatkul);
    }
}
