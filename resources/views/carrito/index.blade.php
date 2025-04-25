@extends('layout')

@section('content')
    <div class="carrito">
        <div class="cuadro">
            <div class="carrito-contenido">
                <h2>{{ __('general.ped') }}</h2>

                @foreach ($carrito as $kebab => $details)
                    <div class="producto">
                        <div class="producto-info">
                            <button class="btn-eliminar"
                                onclick="window.location.href='{{ route('pedido.delete', ['kebab' => $kebab]) }}'"><i
                                    class="fa-solid fa-trash"></i></button>
                            <div class="texto">
                                <h3>{{ __('general.k' . $details['carne']) }}</h3>
                                <p>
                                    @if ($details['lechuga'] == 0)
                                        {{ __('general.sin') }} {{ __('general.lechuga') }}
                                    @elseif ($details['lechuga'] > 1)
                                        {{ __('general.extra') }} {{ __('general.lechuga') }}
                                    @endif
                                </p>
                                <p>
                                    @if ($details['tomate'] == 0)
                                        {{ __('general.sin') }} {{ __('general.tomate') }}
                                    @elseif ($details['tomate'] > 1)
                                        {{ __('general.extra') }} {{ __('general.tomate') }}
                                    @endif
                                </p>
                                <p>
                                    @if ($details['cebolla'] == 0)
                                        {{ __('general.sin') }} {{ __('general.cebolla') }}
                                    @elseif ($details['cebolla'] > 1)
                                        {{ __('general.extra') }} {{ __('general.cebolla') }}
                                    @endif
                                </p>
                                <p>
                                    @if ($details['salsa'] == 0)
                                        {{ __('general.sin') }} {{ __('general.salsa') }}
                                    @elseif ($details['salsa'] > 1)
                                        {{ __('general.extra') }} {{ __('general.salsa') }}
                                    @endif
                                </p>
                                <p>
                                    @if ($details['picante'] == 0)
                                        {{ __('general.sin') }} {{ __('general.picante') }}
                                    @elseif ($details['picante'] > 1)
                                        {{ __('general.extra') }} {{ __('general.picante') }}
                                    @endif
                                </p>
                                <p>
                                    @if (
                                        $details['lechuga'] == 1 &&
                                            $details['tomate'] == 1 &&
                                            $details['cebolla'] == 1 &&
                                            $details['salsa'] == 1 &&
                                            $details['picante'] == 1)
                                        {{ __('general.con') }}
                                    @endif
                                </p>
                            </div>
                            <div class="precio-unidad">{{ $details['precio'] }}€</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="resumen">
                <div class="total">
                    <h3>{{ __('general.subtotal') }}</h3>
                    <p id="total-pedido">{{ $total }}€</p>
                </div>

                <div class="descuento">
                    <h3>{{ __('general.descuento') }}</h3>
                    <div class="nums">
                        <p class="tachado">{{ $total }}€</p>
                        <p>0€</p>
                    </div>
                </div>

                <div class="final">
                    <h3>{{ __('general.total') }}</h3>
                    <p>0€</p>
                </div>
                <div class="pagar">
                    <form action="{{ route('pedido.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="precio_total" value="{{$total}}">
                        <button class="btn-pagar" type="submit">{{ __('general.pagar') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="imagen">
            <img src="{{ asset('imgs/kebab.jpg') }}" alt="Imagen de pedido">
        </div>
    </div>
@endsection
