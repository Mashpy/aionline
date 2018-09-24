<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::insert([
        [
            'id' => '1',
            'parent_id' => null,
            'name' => 'Artificial Intelligence',
            'category_slug' => 'artificial-intelligence'

        ],
            [
                'id' => '2',
                'parent_id' => null,
                'name' => 'Machine Learning',
                'category_slug' => 'machine-learning'
            ],
            [
                'id' => '3',
                'parent_id' => null,
                'name' => 'Natural Language Processing',
                'category_slug' => 'natural-language-processing'
            ]

        ]);

    }
}
