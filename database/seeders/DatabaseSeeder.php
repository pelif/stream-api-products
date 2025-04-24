<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)
            ->create(['email' => 'pH4oI@example.com', 'password' => '123456']);

        $categories = [
            [
                'id' => Str::uuid(),
                'title' => 'Category 1',
                'user_id' => User::first()->id
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Category 2',
                'user_id' => User::first()->id
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Category 3',
                'user_id' => User::first()->id
            ]
        ];

        Category::insert($categories);

        $products = [
            [
                'id' => Str::uuid(),
                'title' => 'Product 1',
                'description' => 'Product 1 description',
                'price' => 10.99,
                'image' => 'product1.jpg',
                'category_id' => $categories[0]['id'],
                'user_id' => User::first()->id
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Product 2',
                'description' => 'Product 2 description',
                'price' => 20.99,
                'image' => 'product2.jpg',
                'category_id' => $categories[1]['id'],
                'user_id' => User::first()->id
            ],
            [
                'id' => Str::uuid(),
                'title' => 'Product 3',
                'description' => 'Product 3 description',
                'price' => 30.99,
                'image' => 'product3.jpg',
                'category_id' => $categories[2]['id'],
                'user_id' => User::first()->id
            ]
        ];

        Product::insert($products);



        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
