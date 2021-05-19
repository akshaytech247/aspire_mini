<?php

namespace Database\Factories;

use App\Models\UserLoans;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLoansFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserLoans::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => 1000,
            'term' => 1,
            'next_repayment_date' => now(), // password
            'user_id' => 1,
            'approved_by_user_id' => 2,
            'approved' => rand(0,1)
        ];
    }
}
