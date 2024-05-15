<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Business', 'icon' => null, 'type' => 'income'],
            ['name' => 'Extra Income', 'icon' => null, 'type' => 'income'],
            ['name' => 'Gifts', 'icon' => null, 'type' => 'income'],
            ['name' => 'Loan', 'icon' => null, 'type' => 'income'],
            ['name' => 'Salary', 'icon' => null, 'type' => 'income'],
            ['name' => 'Other', 'icon' => null, 'type' => 'income'],

            ['name' => 'Food & Drink', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Gifts', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Shopping', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Home', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Travel', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Transport', 'icon' => null, 'type' => 'expense'],
            ['name' => 'Work', 'icon' => null, 'type' => 'expense'],

        ];

        foreach($categories as $category){
            Category::create($category);
        }


    }
}
