<?php

use App\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nim' => '100101001',
            'nama' => 'WAHYUDI',
            'alamat' => 'SURAKARTA',
            'kd_prodi' => '01',
        ]);

        Mahasiswa::create([
            'nim' => '100101002',
            'nama' => 'SRIYONO',
            'alamat' => 'KLATEN',
            'kd_prodi' => '01',
        ]);

        Mahasiswa::create([
            'nim' => '100202001',
            'nama' => 'RUSTANTO',
            'alamat' => 'SUKOHARJO',
            'kd_prodi' => '02',
        ]);

        Mahasiswa::create([
            'nim' => '100103001',
            'nama' => 'SRI HANDAYANI',
            'alamat' => 'SRAGEN',
            'kd_prodi' => '02',
        ]);

        Mahasiswa::create([
            'nim' => '100204001',
            'nama' => 'HANDAYANI',
            'alamat' => 'KLATEN',
            'kd_prodi' => '04',
        ]);

        Mahasiswa::create([
            'nim' => '100204002',
            'nama' => 'SRI MARIYATUN',
            'alamat' => 'SURAKARTA',
            'kd_prodi' => '04',
        ]);

        Mahasiswa::create([
            'nim' => '100103002',
            'nama' => 'EKO WAHYUDI',
            'alamat' => 'SURAKARTA',
            'kd_prodi' => '03',
        ]);
    }
}
