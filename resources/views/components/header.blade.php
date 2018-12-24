<div class="container">
    <div class="header">  
        <div class="header__left">
            <a href="/"><img src="/images/logo-seekasia.png"/></a>
        </div>
        <div class="header__right">
            @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @else               
            {{ Auth::user()->email }}
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>   
            @endguest
        </div>
    </div>
</div>