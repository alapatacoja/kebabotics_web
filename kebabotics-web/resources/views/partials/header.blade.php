<header>
    <div class="logo">
        <a href="{{ route('home') }}">{{-- <span class="fa-brands fa-pinterest"></span> --}}
            <h1><img src="/imgs/logo.png" alt="logo kebabotics"></h1>
        </a>

    </div>
    <div class="resto">
        <div class="nav">
            <ul>
                <li class="idioma"><a
                        href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
                @else
                {{ route('changelang', 'es') }} @endif"><i
                            class="fa-solid fa-language"></i>
                        @if (Config::get('languages')[App::getLocale()] == 'Español')
                            ES
                        @else
                            EN
                            @endif
                    </a>

                    {{-- @foreach (Config::get('languages') as $lang => $language)
                            <a href="{{route('changelang', $lang)}}">{{$language}}</a>                 
                    @endforeach --}}
                </li>
                @if (Auth::check())
                    <li class="icon-hover"><a href="{{ route('posts.create') }}"><i class="fa-solid fa-circle-plus"></i>
                            {{ __('general.topost') }}</a></li>
                    <div class="drop-acc">
                        <li class="icon-hover"><a href="{{ route('users.show', Auth::user()) }}"><i
                                    class="fa-solid fa-circle-user" id="drop"></i>{{ __('general.account') }}</a>
                        </li>
                        <li><i class="fa-solid fa-chevron-down hover"></i>
                            <ul class="dropdown">
                                <li style="border-radius: 20px 20px 0 0"><a
                                        href="{{ route('users.show', Auth::user()) }}"><i class="fa-solid fa-user"></i>
                                        {{ __('general.account') }}</a></li>

                                <li><a href="{{ route('user.edit', Auth::user()) }}"><i class="fa-solid fa-gear"></i>
                                        {{ __('general.settings') }}</a>
                                </li>

                                <li style="border-radius:  0 0 20px 20px"><a href="{{ route('logout') }}"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('general.logout') }}</a></li>
                            </ul>
                    </div>

                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="boton">{{ __('general.login') }}</a></li>
                    <li><a href="{{ route('register') }}" class="boton"
                            id="register">{{ __('general.register') }}</a></li>
                @endif

            </ul>
        </div>
    </div>
</header>
{{-- {{Config::get('languages')[App::getLocale()]}} --}}
