<?php

use Illuminate\Database\Seeder;

class Link_tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Link_tag::create([
            'link_id' => 1,
            'tag_id' => 1
        ]);
    }
}
