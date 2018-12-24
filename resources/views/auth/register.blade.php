@extends('layouts.app')

@section('content')
<div class="container">
              
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

            @if ($errors->has('name'))
                <span class="error" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
            

        <div>
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="error" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>


        <div>
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                @if ($errors->has('password'))
                    <span class="error" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div>    
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation">
        </div>
      
        <div>
            <button type="submit">{{ __('Register') }}</button>
        </div>
    </form>
@endsection
