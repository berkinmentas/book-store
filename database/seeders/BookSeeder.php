<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Sefiller',
                'category_id' => 1,
                'author' => 'Victor Hugo',
                'publisher' => 'Can Yayınları',
                'year' => '1862',
                'page_count' => '1232',
                'short_description' => 'Toplumsal adaletin hikayesi.',
                'description' => 'Jean Valjean\'ın kurtuluş ve mücadele hikayesi.',
                'price' => '120',
                'image' => 'book1.webp',
            ],
            [
                'title' => '1984',
                'category_id' => 2,
                'author' => 'George Orwell',
                'publisher' => 'İthaki Yayınları',
                'year' => '1949',
                'page_count' => '328',
                'short_description' => 'Büyük Birader seni izliyor.',
                'description' => 'Distopik bir gelecekte totaliter rejim eleştirisi.',
                'price' => '85',
                'image' => 'book2.jpg',
            ],
        ];

        foreach ($books as $data) {
            $book = Book::create([
                'title' => $data['title'],
                'category_id' => $data['category_id'],
                'author' => $data['author'],
                'publisher' => $data['publisher'],
                'year' => $data['year'],
                'page_count' => $data['page_count'],
                'short_description' => $data['short_description'],
                'description' => $data['description'],
                'price' => $data['price'],
            ]);

            $imagePath = storage_path('app/public/sample-images/' . $data['image']);

            if (file_exists($imagePath)) {
                $book->addMedia($imagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('book_cover');
            }
        }
    }
}
