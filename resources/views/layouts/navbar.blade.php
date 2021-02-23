<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="{{ url('ProgrammeerTalen') }}">
        <img src="{{ asset('img/Logo.png') }}" alt="Scrumapp" width="30" height="30" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
{{--    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--        <ul class="navbar-nav">--}}
{{--            @if (Auth::check())--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="navbar-brand nav-link dropdown-toggle active font-weight-bold" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        @yield('ProgrammeerTalen')--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        @if ($project == 'Scrumapp')--}}
{{--                            <a class="dropdown-item" href="{{ url('/projects/create') }}">Create Project</a>--}}
{{--                        @else--}}
{{--                            <a class="dropdown-item" href="{{ url('/projects/'.$project.'/edit') }}">Settings</a>--}}
{{--                        @endif--}}
{{--                        <a class="dropdown-item" href="{{ url('/projects') }}">Projects Overview</a>--}}

{{--                    </div>--}}
{{--                </li>--}}
{{--            @else--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="navbar-brand nav-link active font-weight-bold">--}}
{{--                        @yield('project')--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
{{--        </ul>--}}
{{--    </div>--}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
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
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
</nav>

<!--Het wat tussen comments staat kan ik pas maken als ik weet wat stephan gaat leveren qwa videos en opdrachteb-->
<!--Wat er tussen de comments staat komt uit mijn scrumapp project-->
