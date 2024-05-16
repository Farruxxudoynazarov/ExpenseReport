<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class;


    public function definition(): array
    {

        return [
            
            // 'user'
            'amount' => $this->faker->randomFloat(2,1,1000),
            'description' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'payment_date' => $this->faker->dateTimeThisYear()

 
        ];
    }
}
