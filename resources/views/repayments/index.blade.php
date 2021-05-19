@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body" style="background: lightyellow;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Loan id</th>
                                <th>Term</th>
                                <th>Amount</th>
                                <th>Repayment Amount</th>
                                <th>Repaid Amount</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>loan-{{ $value->id}}</td>
                                    <td>{{ $value->term}}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ $value->repayment_amount}}</td>
                                    <td>{{ $value->repaid_amount}}</td>
                                    <td>{{ \Carbon\Carbon::createFromDate($value->next_repayment_date)->diffForHumans()}}</td>
                                    <td>
                                        @if($value->repaid_amount < $value->repayment_amount )
                                            <a class="btn btn-danger"
                                               href="{{ route('repayments.pay',[$value->id]) }}">Pay</a>
                                        @else
                                            <a class="btn btn-success"
                                               href="#">Paid</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if(count($data)==0)
                                <tr><td colspan="5">No Rows Found</td></tr>
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
