@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body" style="background: lightyellow;">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-{{ $message['type'] }}">
                                <p>{{ $message['desc'] }}</p>
                            </div>
                        @endif
                            <form action="{{route('repayment.create')}}">
                                <div class="form-group" style=" background: beige; ">
                                    <label>Loan ID :</label>
                                    <label class="info">{{$data->id}}</label>
                                </div>
                                <div class="form-group"style=" background: beige; ">
                                    <label>Amount :</label>
                                    <span>{{$data->amount}}</span>
                                </div>
                                <div class="form-group"style=" background: beige; ">
                                    <label>Total Repayment Amount :</label>
                                    <span>{{$data->repayment_amount}}</span>
                                </div>
                                <div class="form-group"style=" background: beige; ">
                                    <label>Repayment Received :</label>
                                    <span>{{$data->repaid_amount}}</span>
                                </div>
                                <div class="form-group"style=" background: beige; ">
                                    <label>Repayment Due :</label>
                                    <span>{{$data->repayment_amount - $data->repaid_amount}}</span>
                                </div>
                                <div class="form-group">
                                    <label >Enter Repayment Amount</label>
                                    <input type="hidden" name="loan_id" value="{{$data->id}}" />
                                    <input type="number" placeholder="Enter Amount" step="0.01" min="1" max="100000000" class="form-control" name="repayment_amount" value="{{ old('repayment_amount') }}" required autofocus  id="repayment_amount" placeholder="Enter Amount To Repay">
                                </div>
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
