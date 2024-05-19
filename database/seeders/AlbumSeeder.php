<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("albums")->insert([
            ['name' => 'Kind of blue', 'year' => 2021, 'times_sold' => 100, 'created_at' => now(), 'band_id' => 1,  'updated_at' => now()],
           ['name' => 'Midnights', 'year' => 2020, 'times_sold' => 150,'created_at' => now(), 'band_id' => 2, 'updated_at'  => now()],
            ['name' => 'The black saint', 'year' => 2019, 'times_sold' => 200,'created_at' => now(), 'band_id' => 3, 'updated_at' => now()],
            ['name' => 'Night Life', 'year' => 2018, 'times_sold' => 120,'created_at' => now(), 'band_id' => 3, 'updated_at' => now()],
            ['name' => 'Elvis is Back', 'year' => 2017, 'times_sold' => 180,'created_at' => now(),'band_id' => 2, 'updated_at' => now()],
            ]);    }
}
