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
                            <div id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="nav nav-loans mb-3" id="loans-tab" role="tablist">
                                    @if(Auth::user() && Auth::user()->is_admin==0)
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::is('user_loans.create') ? 'active' : '' }}"
                                               id="loan-create-tab" href="{{route('user_loans.create')}}" role="tab"
                                               aria-selected="true">Request Loan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  {{ Route::is('user_loans.index') ? 'active' : '' }}"
                                               id="loan-create-tab" href="{{route('user_loans.index')}}" role="tab"
                                               aria-selected="false">My Loan Requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ Route::is('repayment.index') ? 'active' : '' }}"
                                               id="repayment-create-tab" href="{{route('repayment.index')}}" role="tab"
                                               aria-selected="false">My Repayment</a>
                                        </li>
                                    @endif
                                    @if(Auth::user() && Auth::user()->is_admin==1)
                                        <li class="nav-item {{ Route::is('user_loans.approve') ? 'active' : '' }}">
                                            <a class="nav-link" id="loan-approve-tab" href="{{route('user_loans.approve')}}" role="tab"
                                               aria-selected="false">Loan Requests Pending</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
