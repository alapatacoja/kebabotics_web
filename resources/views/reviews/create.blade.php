@extends('layout')

@section('content')
<div class="review-container">
    <div class="review-image">
        <img src="{{ asset('imgs/kebab.jpg') }}" alt="Opiniones Kebabotics">
    </div>

    <form class="review-form" action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="nombre">{{ __('general.nombre') }}</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="texto">{{ __('general.texto') }}</label>
        <textarea name="texto" id="texto" rows="4" required></textarea>

        <label>{{ __('general.puntuacion') }}</label>
        <div class="estrellas">
            @for ($i = 1; $i <= 5; $i++)
                <input type="radio" id="estrella{{ $i }}" name="puntuacion" value="{{ $i }}">
                <label for="estrella{{ $i }}" title="{{ $i }} estrellas">&#9733;</label>
            @endfor
        </div>

        <label for="foto">{{ __('general.foto') }}</label>
        <input type="file" name="foto" id="foto" accept="image/*">

        <button type="submit">{{ __('general.enviar') }}</button>
    </form>
</div>
@endsection
