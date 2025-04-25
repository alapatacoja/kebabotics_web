@extends('layout')

@section('content')
    
        <div class="grid">
            <div class="kebab">
                <div class="img"><img src="imgs/pollo.png" alt="kebab de pollo"></div>
                <div class="info">
                    <p class="nombre">{{ __('general.kpollo') }}</p>
                    <p class="ingredientes">{{ __('general.pollo') }}, {{ __('general.lechuga') }},
                        {{ __('general.tomate') }},
                        {{ __('general.cebolla') }}, {{ __('general.salsa') }}, {{ __('general.picante') }}</p>
                </div>
                <div class="precio">5€</div>
                <div class="butones">
                    <form action="{{route('pedido.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="carne" value="pollo">
                        <button class="btn" type="submit">{{__('general.add')}}</button>
                    </form>
                    <a href="{{route('pedido.edit', 'pollo')}}" class="btn">{{__('general.mod')}}</a>
                </div>
            </div>
            <div class="kebab">
                <div class="img"><img src="imgs/ternera.png" alt="kebab de ternera"></div>
                <div class="info">
                    <p class="nombre">{{ __('general.kternera') }}</p>
                    <p class="ingredientes">{{ __('general.ternera') }}, {{ __('general.lechuga') }},
                        {{ __('general.tomate') }},
                        {{ __('general.cebolla') }}, {{ __('general.salsa') }}, {{ __('general.picante') }}</p>
                </div>
                <div class="precio">5€</div>
                <div class="butones">
                    <form action="{{route('pedido.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="carne" value="ternera">
                        <button class="btn" type="submit">{{__('general.add')}}</button>
                    </form>
                    <a href="{{route('pedido.edit', 'ternera')}}" class="btn">{{__('general.mod')}}</a>
                </div>
            </div>
            <div class="kebab">
                <div class="img"><img src="imgs/mixto.png" alt="kebab mixto"></div>
                <div class="info">
                    <p class="nombre">{{ __('general.kmixto') }}</p>
                    <p class="ingredientes">{{ __('general.pollo') }}, {{ __('general.ternera') }}, {{ __('general.lechuga') }},
                        {{ __('general.tomate') }},
                        {{ __('general.cebolla') }}, {{ __('general.salsa') }}, {{ __('general.picante') }}</p>
                </div>
                <div class="precio">5€</div>
                <div class="butones">
                    <form action="{{route('pedido.add')}}" method="post">
                        @csrf
                        <input type="hidden" name="carne" value="mixto">
                        <button class="btn" type="submit">{{__('general.add')}}</button>
                    </form>
                    <a href="{{route('pedido.edit', 'mixto')}}" class="btn">{{__('general.mod')}}</a>
                </div>
            </div>
        </div>

@endsection
