@extends('layout')

@section('content')
<div class="instrucciones-roadmap">
    <div class="step">
        <div class="circle">1</div>
        <div class="text">
            <h3>{{ __('general.paso1_titulo') }}</h3>
            <p>{{ __('general.paso1_descripcion') }}</p>
        </div>
        <img src="/imgs/ins1.png" alt="Paso 1">
    </div>

    <div class="step">
        <div class="circle">2</div>
        <div class="text">
            <h3>{{ __('general.paso2_titulo') }}</h3>
            <p>{{ __('general.paso2_descripcion') }}</p>
        </div>
        <img src="/imgs/scan2.jpg" alt="Paso 2">
    </div>

    <div class="step">
        <div class="circle">3</div>
        <div class="text">
            <h3>{{ __('general.paso3_titulo') }}</h3>
            <p>{{ __('general.paso3_descripcion') }}</p>
        </div>
        <img src="/imgs/inst3.jpg" alt="Paso 3">
    </div>
</div>
@endsection