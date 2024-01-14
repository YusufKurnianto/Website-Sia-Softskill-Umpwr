<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'role_name' => 'fasilitator',
        ]);

        Role::create([
            'role_name' => 'peserta',
        ]);

        Role::create([
            'role_name' => 'superadmin',
        ]);
        
        User::factory(5)->create();

    }
}