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
            'description' => 'Hoe je goed een node app kan debuggen',
            'score' => '6',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        \App\Link::create([
            'LinkAddress' => 'https://nodeguide.com/',
            'description' => 'Goeie node tuts',
            'score' => '6',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        \App\Link::create([
            'LinkAddress' => 'https://msdn.com/',
            'description' => 'javascript guidelines en refrence',
            'score' => '6',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        \App\Link::create([
            'LinkAddress' => 'https://ikea.com/',
            'description' => 'goeie buro\'s om op de werken',
            'score' => '6',
            'category_id' => 1,
            'user_id' => 2,
        ]);
    }
}
