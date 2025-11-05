<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(10)->create();
        Publisher::factory(5)->create();
        Book::factory(20)->create()->each(function ($book) {
            \App\Models\BookDetail::factory()->create(['book_id' => $book->id]);
        });

        User::factory(10)->create()->each(function ($user) {
            Article::factory(rand(1, 3))->create(['user_id' => $user->id])->each(function ($article) {
                Comment::factory(rand(0, 5))->create(['article_id' => $article->id]);
            });
        });
    }
}
