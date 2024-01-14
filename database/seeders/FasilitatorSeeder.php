<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fasilitators')->insert([
            'id' => '5',
            'NIDN' => '212520026',
            'nama' => 'Lestari',
            'prodi' => 'Teknologi Informasi',

        ]);
    }
}
