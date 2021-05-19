<?php

namespace Database\Seeders;

use App\Models\UserLoans;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserLoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLoans::factory(1)->create(['amount' => '15000', 'repayment_amount' => '19000', 'term' => '1', 'user_id' => 1, 'approved' => 1, 'approved_by_user_id' => 2, 'next_repayment_date' => Carbon::now()->addDay(7)]);
        UserLoans::factory(1)->create(['amount' => '30000', 'repayment_amount' => '37000', 'term' => '2', 'user_id' => 1, 'approved' => 1, 'approved_by_user_id' => 2, 'next_repayment_date' => Carbon::now()->addDay(7)]);
        UserLoans::factory(1)->create(['amount' => '30000', 'repayment_amount' => '39000', 'term' => '3', 'user_id' => 1, 'approved' => 0, 'approved_by_user_id' => 2, 'next_repayment_date' => Carbon::now()->addDay(7)]);
        UserLoans::factory(1)->create(['amount' => '30000', 'repayment_amount' => '37000', 'term' => '2', 'user_id' => 1, 'approved' => 0, 'approved_by_user_id' => 2, 'next_repayment_date' => Carbon::now()->addDay(7)]);
    }
}
