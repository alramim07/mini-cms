<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

/**
 * Seeder: crea articoli di esempio per popolare la sezione blog.
 */
class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory()->count(5)->create();
    }
}
