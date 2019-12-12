<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Polar'
        ]);
        DB::table('genres')->insert([
            'name' => 'Comedie'
        ]);
        DB::table('genres')->insert([
            'name' => 'Science Fiction'
        ]);
        DB::table('genres')->insert([
            'name' => 'Autobiographie'
        ]);
    }
}
