<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'title' => fake()->text,
            'amount' => '100.00',
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
