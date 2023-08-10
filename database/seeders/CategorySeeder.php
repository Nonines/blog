<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_categories = [
            [
                "title" => "news",
                "details" => "a category for news reports",
                "image" => "category-images/default_news.webp"
            ],
            [
                "title" => "tech",
                "details" => "a category for tech posts",
                "image" => "category-images/default_tech.png"
            ],
            [
                "title" => "self-help",
                "details" => "a category for self-help posts",
                "image" => "category-images/default_selfhelp.jpg"
            ],
            [
                "title" => "sports",
                "details" => "a category for sports' posts",
                "image" => "category-images/default_sports.jpeg"
            ],
            [
                "title" => "art",
                "details" => "a category for art posts",
                "image" => "category-images/default_art.jpg"
            ],
            [
                "title" => "music",
                "details" => "a category for music posts",
                "image" => "category-images/default_music.webp"
            ],
            [
                "title" => "coding",
                "details" => "a category for coding posts",
                "image" => "category-images/default_coding.webp"
            ],
        ];

        Category::insert($new_categories);
    }
}
