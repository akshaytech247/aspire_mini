<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ 'Aspire Mini' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav nav-pills mb-3" id="loans-tab" role="tablist">
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

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @if ($message = Session::get('message'))
            <div class="alert alert-{{ $message['type'] }}">
                <p>{{ $message['desc'] }}</p>
            </div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
