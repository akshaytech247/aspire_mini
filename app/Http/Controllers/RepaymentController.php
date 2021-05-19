<?php

namespace App\Http\Controllers;

use App\Models\Repayment;
use App\Models\UserLoans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserLoans::where('user_id', Auth::user()->id)->where('approved', 1)->where('repayment_amount', '>', 'repaid_amount')->latest()->paginate(5);

        return view('repayments.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay($id)
    {
        $data = UserLoans::where('id', $id)->first();
        return view('repayments.pay', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repayment_amount = floatval(request('repayment_amount'));
        $status = false;
        if ($repayment_amount > 0 && request('loan_id') > 0 && Auth::user()) {
            $user_loan = UserLoans::where('id', request('loan_id'))->where('user_id', Auth::user()->id)->first();
            if ($user_loan) {
                $user_loan->repaid_amount += $repayment_amount;
                if ($user_loan->repaid_amount <= $user_loan->repayment_amount) {
                    $user_loan->update();
                    $status = true;
                }

            }
        }
        if ($status == true) {
            return redirect()->route('repayment.index')
                ->with('message', ['type' => 'success', 'desc' => 'Repayment done!!']);
        } else {
            return redirect()->route('repayment.index')
                ->with('message', ['type' => 'danger', 'desc' => 'Unable to complete repayment']);
        }
    }

}
