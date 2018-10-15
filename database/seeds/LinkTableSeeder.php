<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Link::create([
            'LinkAddress' => 'https://stackoverflow.com/',
            'score' => '6',
            'category_id' => 1,
        ]);
    }
}
