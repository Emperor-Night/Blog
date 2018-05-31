<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $content = '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consequat justo nisi, feugiat cursus tortor aliquet vitae. Nullam ultrices non eros id fringilla. Sed ac dictum purus. Quisque ultrices orci diam, vitae aliquam lorem pulvinar a. Ut semper orci non quam suscipit scelerisque id vel elit. Sed blandit, turpis eget placerat consequat, lectus magna euismod turpis, in mattis odio tortor sed orci. Cras faucibus metus quis egestas laoreet. Aenean orci tellus, cursus at posuere et, rutrum nec mauris. Phasellus sem libero, dapibus nec sagittis eget, interdum in elit.</p>
<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Maecenas eu quam sollicitudin dolor lacinia facilisis eu at lacus. Ut faucibus urna quis est molestie, id tempor nunc venenatis. Proin dictum arcu in odio porttitor, nec suscipit elit sodales. Vestibulum malesuada ipsum ut varius ullamcorper. Donec scelerisque turpis vel mi molestie tempus. Etiam in egestas erat. Suspendisse potenti. Maecenas vel odio erat. Mauris tempor id massa ac semper. Proin venenatis iaculis magna id mollis. In hac habitasse platea dictumst. Ut malesuada hendrerit purus vel auctor. Vivamus in risus maximus, pharetra dui ac, mattis eros. Aliquam volutpat dignissim felis quis gravida.</p>';

        $post = \App\Post::create([
            "title"       => "HTML Title",
            "slug"        => "html-title",
            "content"     => $content,
            "photo_id"    => 1,
            "user_id"     => 1,
            "category_id" => 1,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "CSS Title",
            "slug"        => "css-title",
            "content"     => $content,
            "photo_id"    => 2,
            "user_id"     => 1,
            "category_id" => 2,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "JavaScript Title",
            "slug"        => "javascript-title",
            "content"     => $content,
            "photo_id"    => 3,
            "user_id"     => 1,
            "category_id" => 3,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "jQuery Title 1",
            "slug"        => "jquery-title-1",
            "content"     => $content,
            "photo_id"    => 4,
            "user_id"     => 2,
            "category_id" => 4,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "jQuery Title 2",
            "slug"        => "jquery-title-2",
            "content"     => $content,
            "photo_id"    => 5,
            "user_id"     => 2,
            "category_id" => 4,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "jQuery Title 3",
            "slug"        => "jquery-title-3",
            "content"     => $content,
            "photo_id"    => 6,
            "user_id"     => 2,
            "category_id" => 4,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "PHP Title 1",
            "slug"        => "php-title-1",
            "content"     => $content,
            "photo_id"    => 7,
            "user_id"     => 2,
            "category_id" => 5,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "PHP Title 2",
            "slug"        => "php-title-2",
            "content"     => $content,
            "photo_id"    => 8,
            "user_id"     => 2,
            "category_id" => 5,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "PHP Title 3",
            "slug"        => "php-title-3",
            "content"     => $content,
            "photo_id"    => 9,
            "user_id"     => 2,
            "category_id" => 5,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "Laravel Title 1",
            "slug"        => "laravel-title-1",
            "content"     => $content,
            "photo_id"    => 10,
            "user_id"     => 3,
            "category_id" => 6,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "Laravel Title 2",
            "slug"        => "laravel-title-2",
            "content"     => $content,
            "photo_id"    => 11,
            "user_id"     => 3,
            "category_id" => 6,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

        $post = \App\Post::create([
            "title"       => "Laravel Title 3",
            "slug"        => "laravel-title-3",
            "content"     => $content,
            "photo_id"    => 12,
            "user_id"     => 3,
            "category_id" => 6,
        ]);
        $post->tags()->attach([rand(1, 5)]);
        sleep(1);

    }


}
