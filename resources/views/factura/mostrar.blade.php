@extends('layout')
@section('content')
<div class="confirmacion">
    <div class="mensaje">
        <h2>{{ __('general.operacion') }}</h2>
    </div>

    <div class="detalles">
        <div class="derecha">
            <p>{{ __('general.num') }}:</p>
            <p class="pedido-numero"><strong>{{ $pedido->numero_pedido }}</strong></p>
            <p>{{ __('general.ventana') }}</p>
        </div>

        <div class="izquierda">
            <p>{{ __('general.qr') }}</p>
            <div class="qr">
                <img src="{{$qr}}" alt="">
            </div>
        </div>
    </div>

    <div class="acciones">
        <a href="{{route('factura.descargar', $pedido->id)}}" class="btn">{{__('general.factura')}}</a>
        <a href="{{route('pedido.index')}}" class="btn">{{__('general.otro')}}</a>
        <a href="{{route('review.create', $pedido->id)}}" class="btn">{{__('general.review')}}</a>

    </div>
</div>
@endsection