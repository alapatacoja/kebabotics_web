@extends('layout')

@section('content')
<div id="popup" class="{{ $max ? 'popup-show' : '' }}">
  <div class="popup-content">
    <p>❌ {{__('general.popup')}}</p>
    <button onclick="cerrarPopup()">{{__('general.aceptar')}}</button>
  </div>
</div>

<div class="gridkebabs">
    <h2>{{__('general.nuestros')}}</h2>
    
    <!-- Kebab de Pollo -->
    <div class="kebab">
        <div class="img">
            <img src="imgs/pollo.png" alt="kebab de pollo">
        </div>
        <div class="info">
            <p class="nombre">{{ __('general.kpollo') }}</p>
            <p class="ingredientes">
                {{ __('general.pollo') }}, {{ __('general.lechuga') }},
                {{ __('general.tomate') }}, {{ __('general.cebolla') }}, 
                {{ __('general.salsa') }}, {{ __('general.picante') }}
            </p>
        </div>
        <div class="precio">5€</div>
        <div class="butones">
            <form action="{{route('pedido.add')}}" method="post">
                @csrf
                <input type="hidden" name="carne" value="pollo">
                <button class="btn" type="submit">
                    <i class="fas fa-cart-plus" style="margin-right: 8px;"></i>
                    {{__('general.add')}}
                </button>
            </form>
            <a href="{{route('pedido.edit', 'pollo')}}" class="btn">
                <i class="fas fa-edit" style="margin-right: 8px;"></i>
                {{__('general.mod')}}
            </a>
        </div>
    </div>
    
    <!-- Kebab de Ternera -->
    <div class="kebab">
        <div class="img">
            <img src="imgs/ternera.png" alt="kebab de ternera">
        </div>
        <div class="info">
            <p class="nombre">{{ __('general.kternera') }}</p>
            <p class="ingredientes">
                {{ __('general.ternera') }}, {{ __('general.lechuga') }},
                {{ __('general.tomate') }}, {{ __('general.cebolla') }}, 
                {{ __('general.salsa') }}, {{ __('general.picante') }}
            </p>
        </div>
        <div class="precio">5€</div>
        <div class="butones">
            <form action="{{route('pedido.add')}}" method="post">
                @csrf
                <input type="hidden" name="carne" value="ternera">
                <button class="btn" type="submit">
                    <i class="fas fa-cart-plus" style="margin-right: 8px;"></i>
                    {{__('general.add')}}
                </button>
            </form>
            <a href="{{route('pedido.edit', 'ternera')}}" class="btn">
                <i class="fas fa-edit" style="margin-right: 8px;"></i>
                {{__('general.mod')}}
            </a>
        </div>
    </div>
    
    <!-- Kebab Mixto -->
    <div class="kebab">
        <div class="img">
            <img src="imgs/mixto.png" alt="kebab mixto">
        </div>
        <div class="info">
            <p class="nombre">{{ __('general.kmixto') }}</p>
            <p class="ingredientes">
                {{ __('general.pollo') }}, {{ __('general.ternera') }}, 
                {{ __('general.lechuga') }}, {{ __('general.tomate') }}, 
                {{ __('general.cebolla') }}, {{ __('general.salsa') }}, 
                {{ __('general.picante') }}
            </p>
        </div>
        <div class="precio">5€</div>
        <div class="butones">
            <form action="{{route('pedido.add')}}" method="post">
                @csrf
                <input type="hidden" name="carne" value="mixto">
                <button class="btn" type="submit">
                    <i class="fas fa-cart-plus" style="margin-right: 8px;"></i>
                    {{__('general.add')}}
                </button>
            </form>
            <a href="{{route('pedido.edit', 'mixto')}}" class="btn">
                <i class="fas fa-edit" style="margin-right: 8px;"></i>
                {{__('general.mod')}}
            </a>
        </div>
    </div>
</div>

<script>
function cerrarPopup() {
  const popup = document.getElementById("popup");
  popup.classList.remove("popup-show");
  popup.style.display = "none"; // Esto sí es válido
}
</script>
@endsection