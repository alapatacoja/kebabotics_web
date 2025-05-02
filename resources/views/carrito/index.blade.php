@extends('layout')

@section('content')
    <div class="carrito">
        <div class="cuadro">
            <div class="carrito-contenido">
                <h2>{{ __('general.ped') }}</h2>

                @if(count($carrito) > 0)
                    @foreach ($carrito as $kebab => $details)
                        <div class="producto">
                            <div class="producto-info">
                                <button class="btn-eliminar" onclick="window.location.href='{{ route('pedido.delete', ['kebab' => $kebab]) }}'">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <div class="texto">
                                    <h3>{{ __('general.k' . $details['carne']) }}</h3>
                                    @if ($details['lechuga'] == 0)
                                        <p>{{ __('general.sin') }} {{ __('general.lechuga') }}</p>
                                    @elseif ($details['lechuga'] > 1)
                                        <p>{{ __('general.extra') }} {{ __('general.lechuga') }}</p>
                                    @endif
                                    
                                    @if ($details['tomate'] == 0)
                                        <p>{{ __('general.sin') }} {{ __('general.tomate') }}</p>
                                    @elseif ($details['tomate'] > 1)
                                        <p>{{ __('general.extra') }} {{ __('general.tomate') }}</p>
                                    @endif
                                    
                                    @if ($details['cebolla'] == 0)
                                        <p>{{ __('general.sin') }} {{ __('general.cebolla') }}</p>
                                    @elseif ($details['cebolla'] > 1)
                                        <p>{{ __('general.extra') }} {{ __('general.cebolla') }}</p>
                                    @endif
                                    
                                    @if ($details['salsa'] == 0)
                                        <p>{{ __('general.sin') }} {{ __('general.salsa') }}</p>
                                    @elseif ($details['salsa'] > 1)
                                        <p>{{ __('general.extra') }} {{ __('general.salsa') }}</p>
                                    @endif
                                    
                                    @if ($details['picante'] == 0)
                                        <p>{{ __('general.sin') }} {{ __('general.picante') }}</p>
                                    @elseif ($details['picante'] > 1)
                                        <p>{{ __('general.extra') }} {{ __('general.picante') }}</p>
                                    @endif
                                    
                                    @if ($details['lechuga'] == 1 && $details['tomate'] == 1 && $details['cebolla'] == 1 && $details['salsa'] == 1 && $details['picante'] == 1)
                                        <p>{{ __('general.con') }}</p>
                                    @endif
                                </div>
                                <div class="precio-unidad">{{ number_format($details['precio'], 2) }}€</div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="carrito-vacio">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>{!! nl2br(__('general.vacio')) !!}</p>
                        <a href="{{ route('pedido.index') }}" class="btn-pedir">
                            <i class="fas fa-utensils"></i>
                            {{ __('general.pedir') }}
                        </a>
                    </div>
                @endif
            </div>
            
            @if(count($carrito) > 0)
                <div class="resumen">
                    <div class="total">
                        <h3>{{ __('general.subtotal') }}</h3>
                        <p id="total-pedido">{{ number_format($total, 2) }}€</p>
                    </div>

                    <div class="descuento">
                        <h3>{{ __('general.descuento') }}</h3>
                        <div class="nums">
                            <p class="tachado">{{ number_format($total, 2) }}€</p>
                            <p>{{ number_format(0, 2) }}€</p>
                        </div>
                    </div>

                    <div class="final">
                        <h3>{{ __('general.total') }}</h3>
                        <p>{{ number_format(0, 2) }}€</p>
                    </div>
                    
                    <div class="pagar">
                        <form action="{{ route('pedido.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="precio_total" value="{{ $total }}">
                            <button class="btn-pagar" type="submit">
                                <i class="fa-solid fa-credit-card"></i>
                                {{ __('general.pagar') }}
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        
        @if(count($carrito) > 0)
            <div class="imagen">
                <img src="{{ asset('imgs/kebab.jpg') }}" alt="Imagen de pedido">
            </div>
        @endif
    </div>
@endsection