<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('admin1234'),
            'role' => 'administrator',
        ]);
        DB::table('users')->insert([
            'name' => 'notadmin',
            'email' => 'notadmin@admin.fr',
            'password' => bcrypt('notadmin1234'),
            'role' => 'notadministrator',
        ]);
    }
}
