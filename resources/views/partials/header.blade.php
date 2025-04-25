<nav>
    <ul class="sidebar">
        <li class="menu close" onclick="hidebar()"><a href=""><i class="fa-solid fa-xmark"></a></i></li>
        <li><a href="{{ route('home') }}">{{ __('general.inicio') }}</a></li>
        <li><a href="{{ route('pedido.index') }}">{{ __('general.pedir') }}</a></li>
        <li><a href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
            @else
                {{ route('changelang', 'es') }} @endif"><i class="fa-solid fa-language"></i>
            </a>

        </li>
    </ul>
    <ul>
        <li class="logo">
            <a href="{{ route('home') }}">
                <img src="/imgs/kababotics_limpio.png" alt="">
                <span class="logo-container">
                    <span class="logo-initials">KEBABÖTICS</span>
                    <span class="logo-full">¡Hola Amigo!</span>
                </span>
            </a>
        </li>
        <li class="hidemobile {{request()->is('/') ? 'active' : ''}}"><a href="{{ route('home') }}"> {{ __('general.inicio') }}</a></li>
        <li class="hidemobile {{request()->is('pedido') ? 'active' : ''}}"><a href="{{ route('pedido.index') }}"> {{ __('general.pedir') }}</a></li>
        <li class="hidemobile icon"><a href="{{route('pedido.carrito')}}" class="carticon"><i class="fa-solid fa-cart-shopping"></i>
        @if(session('carrito') && count(session('carrito')) > 0)
            <span class="carritonum">{{count(session('carrito'))}}</span>
        @endif
        </a></li>
        <li class="hidemobile icon"><a href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
                    @else
                        {{ route('changelang', 'es') }} @endif"><i class="fa-solid fa-language"></i>
        </a>

        </li>
        <li class="menu" onclick="sidebar()"><i class="fa-solid fa-bars"></i></li>
        
    </ul>
</nav>

<script>
    function sidebar() {
        const bar = document.querySelector('.sidebar')
        bar.style.display = 'flex'
    }

    function hidebar() {
        const bar = document.querySelector('.sidebar')
        bar.style.display = 'none'
    }
</script>