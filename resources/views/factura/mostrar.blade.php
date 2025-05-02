@extends('layout')

@section('content')
<div class="factura">
    <div class="mensaje">
        <h2>{{ __('general.operacion') }}</h2>
        <p>{{ __('general.gracias') }}</p>
    </div>

    <div class="detalles">
        <div class="derecha">
            <p><strong>{{ __('general.num') }}:</strong></p>
            <p class="pedido-numero">{{ $pedido->numero_pedido }}</p>
            <p>{{ __('general.ventana') }}</p>
        </div>

        <div class="izquierda">
            <p><strong>{{ __('general.qr') }}</strong></p>
            <div class="qr">
                <img src="{{ $qr }}" alt="{{ __('general.codigo_qr') }}">
            </div>
        </div>
    </div>

    <div class="acciones">
        <a href="{{ route('factura.descargar', $pedido->id) }}" class="btn">
            <i class="fas fa-file-pdf"></i>
            {{ __('general.factura') }}
        </a>
        <a href="{{ route('pedido.index') }}" class="btn">
            <i class="fas fa-utensils"></i>
            {{ __('general.otro') }}
        </a>
        <a href="{{ route('review.create', $pedido->id) }}" class="btn">
            <i class="fas fa-star"></i>
            {{ __('general.review') }}
        </a>
    </div>
</div>
@endsection