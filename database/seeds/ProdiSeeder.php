<?php

use App\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'kd_prodi' => '01',
            'nama_prodi' => 'SISTEM INFORMASI',
            'kd_dosen' => '000001',
        ]);

        Prodi::create([
            'kd_prodi' => '02',
            'nama_prodi' => 'MANAJEMEN INFORMATIKA',
            'kd_dosen' => '000002',
        ]);

        Prodi::create([
            'kd_prodi' => '03',
            'nama_prodi' => 'TEKNIK INFORMATIKA',
            'kd_dosen' => '000003',
        ]);

        Prodi::create([
            'kd_prodi' => '04',
            'nama_prodi' => 'TEKNIK KOMPUTER',
            'kd_dosen' => '000004',
        ]);
    }
}
