<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class; 

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence; 
        $content = $this->faker->paragraphs(asText: true); 
        $created_at = $this->faker->dateTimeBetween('-1 year'); 

        return [
            'title' => $title,
            'slug' => Str::slug($title), 
            'excerpt' => Str::limit($content, 150), 
            'content' => $content, // Contenu du post
            'thumbnail' => $this->faker->imageUrl(), 
            'created_at' => $created_at, 
            'updated_at' => $created_at, 
        ];
    }
}
