<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_loans', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount')->nullable(false);
            $table->decimal('repayment_amount')->nullable(false);
            $table->decimal('repaid_amount')->default(0);
            $table->integer('term')->nullable(false);
            $table->dateTime('next_repayment_date')->nullable(false);
            $table->foreignId('user_id')->nullable(false);
            $table->foreignId('approved_by_user_id')->nullable(false);
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_loans');
    }
}
