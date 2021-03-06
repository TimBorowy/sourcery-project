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
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        \App\User::create([
            'name' => 'Timbo',
            'email' => 'timbo@timbo.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
    }
}
