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
            ],
            [
                "title" => "tech",
                "details" => "a category for tech posts",
            ],
            [
                "title" => "self-help",
                "details" => "a category for self-help posts",
            ],
            [
                "title" => "sports",
                "details" => "a category for sports' posts",
            ],
            [
                "title" => "art",
                "details" => "a category for art posts",
            ],
            [
                "title" => "music",
                "details" => "a category for music posts",
            ],
            [
                "title" => "coding",
                "details" => "a category for coding posts",
            ],
        ];

        Category::insert($new_categories);
    }
}
