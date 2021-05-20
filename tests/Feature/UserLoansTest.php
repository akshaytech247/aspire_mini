<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserLoans;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoansTest extends TestCase
{

    /**
     * to test if user is able to request a loan.
     *
     * @return void
     */
    public function test_a_user_can_request_loan()
    {
        $user = User::factory()->create();
        $user_loan = [
            'amount' => 10000,
            'term' => 2,
            'user_id' => $user->id
        ];
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/user_loans', $user_loan);
        $response->assertStatus(302);
        $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/user_loans')
            ->assertSee($user_loan['amount']);
    }

    /**
     * to test if admin is able to approve a loan.
     *
     * @return void
     */
    public function test_admin_can_approve_loan()
    {
        $user = User::factory()->create(["is_admin" => 1]);
        $user_loan = UserLoans::where('approved', 0)->first();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/user_loans/approve_edit/' . $user_loan->id . '/1');
        $response->assertStatus(302);
        $user_loan->approved = 1;
        $user_loan->approved_by_user_id = $user->id;
        unset($user_loan->created_at);
        unset($user_loan->updated_at);
        $this->assertDatabaseHas('user_loans', $user_loan->toArray());
    }


    /**
     * to test if user is able to repay a loan.
     *
     * @return void
     */
    public function test_user_can_repay_loan()
    {
        $user_loan = UserLoans::where('approved', 1)->where('repaid_amount', 0)->first();
        $user = User::where('id', $user_loan->user_id)->first();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->call('GET', '/repayment/create', [
                'loan_id' => $user_loan->id,
                'repayment_amount' => 1000
            ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('user_loans', [
            'id' => $user_loan->id,
            'repaid_amount' => 1000
        ]);
    }

}
