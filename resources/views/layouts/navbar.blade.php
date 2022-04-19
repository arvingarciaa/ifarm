<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#006838">             
    <div class="container">
        <a class="navbar-brand" href="https://competense.com/ifarm">
            <h4 style="color:white"><img alt="iFarm Footer" src="/storage/website_assets/ifarm_white.png" style="max-height:25px"></h4>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto text-center">
                @guest

                <li class="nav-item">
                    <a class="nav-link" style="color:white !important" href="https://ifarm.ai4gov.net/login">{{ __('LOGIN') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white !important" href="https://ifarm.ai4gov.net/register">{{ __('REGISTER') }}</a>
                    </li>
                @endif
                <!--
                <li class="nav-item">
                    <a class="nav-link" style="color:white !important" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:white !important" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                    </li>
                @endif
                -->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="color:white !important" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome, {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

  
