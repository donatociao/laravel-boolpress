<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) {
          $post = new Post();
          $post->title = $faker->sentence();
          $post->author = $faker->firstName . ' ' . $faker->lastName;
          $post->content = $faker->text(2000);
          $post->slug = Str::slug($post->title);
          $post->save();
        }
    }
}
