<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MahasiswaSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(DosenSeeder::class);
    }
}
