@extends('layout')

@section('content')
    <div class="sobre-nosotros">
        <div class="textoyfoto">
            <div class="foto">
                <img src="{{asset('imgs/logo.png')}}" alt="logo">
            </div>
            <div class="texto">
                <h3>{{ __('general.quees') }}</h3>
                <p>{{ __('general.descripcion1') }}</p>
                <p>{{ __('general.descripcion2') }}</p>
            </div>

        </div>

        <div class="jsnhdkaj">
            <h2>{{ __('general.equipo') }}</h2>
            <div class="integrantes">
                <div class="persona">
                    <img src="{{ asset('imgs/alex.jpg') }}" alt="Alex">
                    <p>Alexandra Zapata Rincón</p>
                </div>
                <div class="persona">
                    <img src="{{ asset('imgs/claudia.jpg') }}" alt="Claudia">
                    <p>Claudia Iborra Hurtado</p>
                </div>
                <div class="persona">
                    <img src="{{ asset('imgs/maria.jpg') }}" alt="María">
                    <p>María Bolumar García</p>
                </div>
                <div class="persona">
                    <img src="{{ asset('imgs/dafne.jpg') }}" alt="Dafne">
                    <p>Dafne Alexandra Ceballos Ospina</p>
                </div>
            </div>
        </div>

        <div class="swiper">
            <img src="{{ asset('imgs/swiper.jpg') }}" alt="Swiper" class="marca">
            <p>{{ __('general.swiper') }}</p>
        </div>
    </div>
@endsection
