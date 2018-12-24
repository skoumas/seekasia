@extends('layouts.app')

@section('content')
<div class="container">
    @guest 

        <h1> Welcome! </h1>
        <p> Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to continue!</p>
    @else 
        <h1> Welcome {{ Auth::user()->name }}! </h1>
        <p> Last login: {{ \Carbon\Carbon::parse(Auth::user()->last_login)->diffForHumans() }} - <small> {{ Auth::user()->last_login }}</small></p>
    @endif
   
</div>
@endsection
