@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div>
            <label>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
            </label>
        </div>
      
        
        <div>
            @if (Route::has('password.request'))
                <a   href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif  
        </div>
        <div>
            <button type="submit">Login</button>
        </div>

        
    </form>          
@endsection
