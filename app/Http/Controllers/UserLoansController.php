<?php

namespace App\Http\Controllers;

use App\Models\UserLoans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class UserLoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserLoans::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('user_loans.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_loans.create');
        ddd(request('loan_amount'), request('loan_term'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'term' => 'required',
        ]);
        $user_loan = new UserLoans([
            'amount' => request('amount'),
            'repayment_amount' => intval(request('amount')) * (1 + (0.2 * intval(request('term')))),
            'term' => request('term'),
            'user_id' => Auth::user()->id,
            'approved_by_user_id' => 0,
            'next_repayment_date' => Carbon::now()->addDay(7)
        ]);
        $user_loan->save();
        return redirect()->route('user_loans.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserLoans $userLoans
     * @return \Illuminate\Http\Response
     */
    public function approve_edit($id, $val = 1)
    {
        $user_loan = UserLoans::where('id', $id)->first();
        $user_loan->approved = $val;
        $user_loan->approved_by_user_id = Auth::user()->id;
        if ($user_loan->update() && $val == 1) {
            return redirect()->route('user_loans.approve')
                ->with('message', ['type' => 'success', 'desc' => 'Approved successfully.']);
        }
        if ($user_loan->update() && $val == 2) {
            return redirect()->route('user_loans.approve')
                ->with('message', ['type' => 'success', 'desc' => 'Disapproved successfully.']);
        }
        return redirect()->route('user_loans.approve')
            ->with('message', ['type' => 'danger', 'desc' => 'Unable to Approve']);

    }

    /**
     * Approve the specified Loan.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function approve()
    {
        $data = UserLoans::where('approved', '0')->get();

        return view('user_loans.approve', compact('data'))->with('i', 0);
    }
}
