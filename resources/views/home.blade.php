@extends('layouts.app')

@section('content')
<div class="container">
    @guest 

        <h1> Welcome! </h1>
        <p> Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to continue!</p>
    @else 
        <h1> Welcome {{ Auth::user()->name }}! </h1>
        <p> Last login was <strong> {{ \Carbon\Carbon::parse(Auth::user()->last_login)->diffForHumans() }} </strong> - <small> {{ Auth::user()->last_login }}</small></p>
        <p> Last email was send to you <strong> {{ \Carbon\Carbon::parse(Auth::user()->last_email)->diffForHumans() }} </strong> - <small>{{ Auth::user()->last_email }}</small></p>
        <p> Your status is now {{ Auth::user()->status }}.</p>
    @endif
   
</div>
@endsection
