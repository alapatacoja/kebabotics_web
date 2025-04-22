<nav>
    <ul class="sidebar">
        <li onclick="hidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                    <path
                        d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg></a></li>
        <li><a href="#">{{ __('general.inicio') }}</a></li>
        <li><a href="#">{{ __('general.pedir') }}</a></li>
        <li><a href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
            @else
                {{ route('changelang', 'es') }} @endif"><i class="fa-solid fa-language"></i>
</a>

</li>
    </ul>
    <ul>
        <li>
            <a href="#">
                <img src="imgs/kababotics_limpio.png" alt="">
                <span class="logo-container">
                    <span class="logo-initials">KEBABÖTICS</span>
                    <span class="logo-full">¡Hola Amigo!</span>
                </span>
            </a>
        </li>
        <li class="hidemobile {{request()->is('/') ? 'active' : ''}}"><a href=""> {{ __('general.inicio') }}</a></li>
        <li class="hidemobile {{request()->is('pedidos') ? 'active' : ''}}"><a href="#"> {{ __('general.pedir') }}</a></li>
        <li class="menu" onclick="sidebar()"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#e3e3e3">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                </svg></a></li>
        <li class="hidemobile idioma"><a href="@if (Config::get('languages')[App::getLocale()] == 'Español') {{ route('changelang', 'en') }}
                    @else
                        {{ route('changelang', 'es') }} @endif"><i class="fa-solid fa-language"></i>
</a>

</li>
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