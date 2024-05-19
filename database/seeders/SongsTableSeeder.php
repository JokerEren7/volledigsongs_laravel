<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("songs")->insert([
            ['title' => 'big time rush', 'singer' => 'hasan', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'spongebob', 'singer' => 'bigsmoke', 'created_at' => now(), 'updated_at' => now()], 
            ['title' => 'cyaho', 'singer' => 'popsmoke', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'boef', 'singer' => 'jeffrey', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'bella ciao', 'singer' => 'kakanpinje', 'created_at' => now(), 'updated_at' => now()],
        ]);  }
}
