<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{

    public function run()
    {
        $photos = [
            "HTML.png", "CSS.png", "Javascript.png", "jQuery1.png", "jQuery2.png", "jQuery3.png", "PHP1.png",
            "PHP2.png", "PHP3.png", "Laravel1.png", "Laravel2.png", "Laravel3.png", "Head_admin.png", "Admin.png",
            "Not_admin.png"
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Photo::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($photos as $photo) {
            \App\Photo::create([
                "name" => $photo,
                "size" => rand(30, 60)
            ]);
        }

    }


}
