<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Comment::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 50; $i++) {

            $post = \App\Post::find(rand(1, 12));

            \App\Comment::create([
                "body"        => "Comment " . $i,
                "user_id"     => $post->user_id,
                "post_id"     => $post->id,
                "category_id" => $post->category_id,
                "status"      => rand(0, 1)
            ]);
        }

    }


}
