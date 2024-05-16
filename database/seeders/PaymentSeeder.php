<?php

namespace Database\Seeders;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $users = User::all();

        Payment::factory()->count(15)->make()->each(function ($payment) use ($categories, $users) {
            
            $payment->category_id = $categories->random()->id;
            $payment->user_id = $users->random()->id;
            $payment->save();
        });
    }
}
