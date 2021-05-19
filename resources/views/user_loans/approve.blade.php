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
                                <th>Amount</th>
                                <th>Term</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td>{{ \Str::limit($value->term, 100) }}</td>
                                    <td width="230">
                                        <a class="btn btn-success"
                                           href="{{ route('user_loans.approve_edit',[$value->id,'1']) }}">Approve</a>
                                        <a class="btn btn-danger"
                                           href="{{ route('user_loans.approve_edit',[$value->id,'2']) }}">Disapprove</a>
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
