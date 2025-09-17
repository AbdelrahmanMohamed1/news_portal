<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts=Post::factory()->count(50)->create();
        $posts->each(function($post){
            Image::factory()->count(rand(1, 3))->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
