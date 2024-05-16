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
        $incomeCategories = [
            ['name' => 'Business', 'icon' => 'business-icon'],
            ['name' => 'Extra Income', 'icon' => 'extra-income-icon'],
            ['name' => 'Gifts', 'icon' => 'gifts-icon'],
            ['name' => 'Loan', 'icon' => 'loan-icon'],
            ['name' => 'Salary', 'icon' => 'salary-icon'],
            ['name' => 'Other', 'icon' => 'other-icon'],
        ];

        $expenseCategories = [
            ['name' => 'Food & Drink', 'icon' => 'food-drink-icon'],
            ['name' => 'Gifts', 'icon' => 'gifts-icon'],
            ['name' => 'Shopping', 'icon' => 'shopping-icon'],
            ['name' => 'Home', 'icon' => 'home-icon'],
            ['name' => 'Travel', 'icon' => 'travel-icon'],
            ['name' => 'Transport', 'icon' => 'transport-icon'],
            ['name' => 'Work', 'icon' => 'work-icon'],
        ];

        foreach ($incomeCategories as $category) {
            Category::create($category);
        }

        foreach ($expenseCategories as $category) {
            Category::create($category);
        }
    }
}
