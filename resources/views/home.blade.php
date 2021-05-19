@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('loanRequest') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Loan Amount') }}</label>

                                    <div class="col-md-6">
                                        <input id="loan_amount" type="number" placeholder="Enter Amount" step="0.01" min="1" max="100000000" class="form-control @error('loan_amount') is-invalid @enderror" name="loan_amount" value="{{ old('loan_amount') }}" required autofocus>

                                        @error('loan_amount')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="loan_term" class="col-md-4 col-form-label text-md-right">{{ __('Loan Term') }}</label>

                                    <div class="col-md-6">
                                        <input id="loan_term" type="number" placeholder="Enter Months" step="1" min="1" max="12" class="form-control @error('loan_term') is-invalid @enderror" name="loan_term" required >

                                        @error('loan_term')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
