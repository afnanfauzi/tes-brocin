<?php

use App\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'kd_dosen' => '000001',
            'nama_dosen' => 'EKO PURWANTO, M.Kom',
            'alamat' => 'SUKOHARJO',
        ]);

        Dosen::create([
            'kd_dosen' => '000002',
            'nama_dosen' => 'FAULINDA ELY NASTITI, M.Eng',
            'alamat' => 'SUKOHARJO',
        ]);

        Dosen::create([
            'kd_dosen' => '000003',
            'nama_dosen' => 'JONI MAULINDAR, M.Eng',
            'alamat' => 'SURAKARTA',
        ]);

        Dosen::create([
            'kd_dosen' => '000004',
            'nama_dosen' => 'SRI SUMARLINDA, M.Kom',
            'alamat' => 'YOGYAKARTA',
        ]);
    }
}
