<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoans extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount', 'term' , 'user_id' , 'approved_by_user_id' ,'approved' ,'next_repayment_date','repayment_amount'
    ];
}
