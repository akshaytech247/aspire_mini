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
                                    <th>Status</th>
                                </tr>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>loan-{{ $value->id}}</td>
                                        <td>{{ $value->term}}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td>{{ $value->repayment_amount}}</td>
                                        <td>{{ $value->repaid_amount}}</td>
                                        <td class="bg-{{ $value->approved ==1 ? 'success' : ($value->approved ==2 ? 'danger' : 'warning') }}">
                                            {{ $value->approved ==1 ? 'Approved' : ($value->approved ==2 ? 'Disapproved' : 'Pending') }}</td>
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
