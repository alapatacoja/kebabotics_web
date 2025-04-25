<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $pedido->numero_pedido }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 20px;
            font-size: 14px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .header-left {
            text-align: left;
        }

        .header-right {
            text-align: right;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .kebab {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .qr {
            margin-top: 30px;
            text-align: center;
        }

        p {
            margin: 3px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <img src="{{ public_path('imgs/logo.png') }}" alt="Logo" width="100"><br>
            <strong>KEBABÖTICS</strong>
        </div>
        <div class="header-right">
            <p><strong>{{ __('general.fechafact') }}</strong> {{ \Carbon\Carbon::parse($pedido->fecha)->format('Y-m-d') }}</p>
            <p><strong>{{ __('general.numfact') }}</strong> {{ $pedido->numero_pedido }}</p>
        </div>
    </div>

    <h1>{{ __('general.titfact') }}</h1>

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
                    $details['picante'] == 1
                )
                    {{ __('general.con') }}
                @endif
            </p>
        </div>
    @endforeach

    <div class="total">
        <p><strong>{{ __('general.subtotal') }}:</strong> {{ $pedido->precio_total }}€</p>
        <p><strong>{{ __('general.descuento') }}:</strong> -{{ $pedido->precio_total }}€</p>
        <p><strong>{{ __('general.total') }}:</strong> 0€</p>
    </div>

    <div class="qr">
        <img src="{{ $qrurl }}" width="150" alt="QR">
    </div>
    
</body>
</html>
