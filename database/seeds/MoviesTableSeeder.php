<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'name' => 'Seven',
            'director' => 'David Fincher',
            'duration' => 2,
            'year' => 1995,
            'genre_id'=>1,
        ]);
        DB::table('movies')->insert([
            'name' => 'Le dîner de cons',
            'director' => 'Francis Veber',
            'duration' => 1,
            'year' => 1998,
            'genre_id'=>2,
        ]);
        DB::table('movies')->insert([
            'name' => 'Lord of rings',
            'director' => 'Peter Jackson',
            'duration' => 4,
            'year' => 2001,
            'genre_id'=>3,
        ]);
        DB::table('movies')->insert([
            'name' => 'Citizen Kane',
            'director' => 'Orson Welles',
            'duration' => 2,
            'year' => 1941,
            'genre_id'=>4,
        ]);
    }
}
