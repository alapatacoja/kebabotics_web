<nav class="{{ request()->is('/') ? 'inicio' : '' }}">
    <ul class="sidebar">
        <li class="menu close" onclick="hidebar()"><a href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a></li>
        <li><a href="{{ route('home') }}">{{ __('general.inicio') }}</a></li>
        <li><a href="{{ route('pedido.index') }}">{{ __('general.pedir') }}</a></li>
        <li><a href="{{ route('instrucciones') }}">{{ __('general.instrucciones') }}</a></li>
        <li><a href="{{ route('sobrenosotros') }}">{{ __('general.sobrenosotros') }}</a></li>
        <li><a href="{{ route('pedido.carrito') }}" class="carticon"><i class="fa-solid fa-cart-shopping"></i>
                @if (session('carrito') && count(session('carrito')) > 0)
                    <span class="carritonum">{{ count(session('carrito')) }}</span>
                @endif
            </a></li>
        <li><a
                href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
            @else
                {{ route('changelang', 'es') }} @endif"><i
                    class="fa-solid fa-language"></i>
            </a>

        </li>
    </ul>
    <ul>
        <li class="logo">
            <a href="{{ route('sobrenosotros') }}">
                <img src="/imgs/kababotics_limpio.png" alt="">
                <span class="logo-container">
                    <span class="logo-initials">KEBABÖTICS</span>
                    <span class="logo-full">¡Hola Amigo!</span>
                </span>
            </a>
        </li>
        <li class="hidemobile {{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">
                {{ __('general.inicio') }}</a></li>
        <li class="hidemobile {{ request()->is('pedido') ? 'active' : '' }}"><a href="{{ route('pedido.index') }}">
                {{ __('general.pedir') }}</a></li>
        <li class="hidemobile {{ request()->is('instrucciones') ? 'active' : '' }}"><a
                href="{{ route('instrucciones') }}"> {{ __('general.instrucciones') }}</a></li>
        <li class="hidemobile icon"><a href="{{ route('pedido.carrito') }}" class="carticon"><i
                    class="fa-solid fa-cart-shopping"></i>
                @if (session('carrito') && count(session('carrito')) > 0)
                    <span class="carritonum">{{ count(session('carrito')) }}</span>
                @endif
            </a></li>
        <li class="hidemobile icon"><a
                href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
                    @else
                        {{ route('changelang', 'es') }} @endif"><i
                    class="fa-solid fa-language"></i>
            </a>

        </li>
        <li class="menu" onclick="sidebar()"><i class="fa-solid fa-bars"></i></li>

    </ul>
</nav>

<script>
    function sidebar() {
        const bar = document.querySelector('.sidebar');
        bar.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function hidebar() {
        const bar = document.querySelector('.sidebar');
        bar.classList.remove('active');
        document.body.style.overflow = 'auto';
        event.preventDefault();
    }
</script>

<script>
    window.addEventListener('scroll', function() {
        const nav = document.querySelector("nav");
        if (window.scrollY > 10) {
            nav.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
        }
    });
</script>
