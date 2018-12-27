<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Seek Asia Email Notifications</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    
</head>
<body>
    <div class="admin">
        <div class="admin__left">
            @include('admin.components.menu')
        </div>
        <div class="admin__right">
            <div class="admin__right__top">
               
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>   
            </div>
            <div class="admin__right__inner">

            @if (Session::has('message'))
                <div class="admin__message">{{ Session::get('message') }}</div>
            @endif
            @yield('content')
            </div>
        </div>
    </div>             
</body>
</html>
