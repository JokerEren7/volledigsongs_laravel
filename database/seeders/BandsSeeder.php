<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class BandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            ['name' => 'Boef', 'genre' => 'pop', 'founded' => '1984', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'lilkleine', 'genre' => 'rock', 'founded' => '1996', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sevn Alias', 'genre' => 'hardcore', 'founded' => '1962', 'created_at' => now(), 'updated_at' => now()],
        ]);
       
    }
}
