<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        $tags = ["tag 1", "tag 2", "tag 3", "tag 4", "tag 5"];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('post_tag')->truncate();
        \App\Tag::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($tags as $tag) {
            \App\Tag::create([
                "name" => $tag,
                "slug" => str_slug($tag)
            ]);
        }

    }


}
