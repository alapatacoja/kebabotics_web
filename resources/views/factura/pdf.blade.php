<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Factura {{ $pedido->numero_pedido }}</title>
        <link rel="stylesheet" href="{{ public_path('css/factura.css') }}">
    </head>
    <body>
        <div class="header">
            <div class="header-left">
                <img src="{{ public_path('imgs/logo.png') }}" alt="Logo">
            </div>
            <div class="header-right">
                <p><strong>{{ __('general.fechafact') }}</strong> {{ \Carbon\Carbon::parse($pedido->fecha)->format('Y-m-d') }}</p>
                <p><strong>{{ __('general.numfact') }}</strong> {{ $pedido->numero_pedido }}</p>
            </div>
        </div>
        <h1 class="titulo">{{ __('general.titfact') }}</h1>
        @foreach ($pedido->kebabs as $kebab)
        <div class="kebab">
            <h3>{{ __('general.k' . $kebab->carne) }} - {{ $kebab->precio }}€</h3>
            @php
            $details = [
            'lechuga' => $kebab->lechuga,
            'tomate' => $kebab->tomate,
            'cebolla' => $kebab->cebolla,
            'salsa' => $kebab->salsa,
            'picante' => $kebab->picante
            ];
            @endphp
            @if (collect($details)->every(fn($v) => $v == 1))
            <p>{{ __('general.con') }}</p>
            @else
            @foreach ($details as $ingrediente => $valor)
            @if ($valor == 0)
            <p>{{ __('general.sin') }} {{ __('general.' . $ingrediente) }}</p>
            @elseif ($valor > 1)
            <p>{{ __('general.extra') }} {{ __('general.' . $ingrediente) }}</p>
            @endif
            @endforeach
            @endif
        </div>
        @endforeach
        <div class="total">
            <p><strong>{{ __('general.subtotal') }}:</strong> {{ $pedido->precio_total }}€</p>
            <p><strong>{{ __('general.descuento') }}:</strong> -{{ $pedido->precio_total }}€</p>
            <p><strong>{{ __('general.total') }}:</strong> 0€</p>
        </div>
        <div class="bottom">
            <div class="qr">
                <p>{{__('general.qr')}}</p>
                <img src="{{ $qrurl }}" alt="QR">
            </div>
            <div class="page-break"></div>
                
                <div class="roadmap-container">
                <h3 class="ins">{{__('general.instrucciones')}}</h3>
                    <div class="roadmap-step">
                        <div class="step-content">
                            <h3>1 - {{ __('general.paso1_titulo') }}</h3>
                            <p>{{ __('general.paso1_descripcion') }}</p>
                        </div>
                    </div>
                    <div class="roadmap-step">
                        <div class="step-content">
                            <h3>2 - {{ __('general.paso2_titulo') }}</h3>
                            <p>{{ __('general.paso2_descripcion') }}</p>
                        </div>
                    </div>
                    <div class="roadmap-step">
                        <div class="step-content">
                            <h3>3 - {{ __('general.paso3_titulo') }}</h3>
                            <p>{{ __('general.paso3_descripcion') }}</p>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>