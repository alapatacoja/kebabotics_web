@extends('layout')

@section('content')
<div class="review-container">
    <div class="review-image">
        <img src="{{ asset('imgs/kebab.jpg') }}" alt="{{ __('general.imagen_review') }}">
    </div>

    <form class="review-form" action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>{{ __('general.opi') }}</h2>
        
        <label for="nombre">{{ __('general.nombre') }}</label>
        <input type="text" name="nombre" id="nombre" placeholder="{{ __('general.ej_nombre') }}" required>
        
        <label for="texto">{{ __('general.texto') }}</label>
        <textarea name="text" id="texto" placeholder="{{ __('general.ej_review') }}" required></textarea>
        
        <div class="rating-container">
            <label>{{ __('general.puntuacion') }}</label>
            <div class="star-rating">
                <input type="radio" id="star5" name="puntuacion" value="5" required>
                <label for="star5" title="5 estrellas"><i class="fa-solid fa-star"></i></label>
                
                <input type="radio" id="star4" name="puntuacion" value="4">
                <label for="star4" title="4 estrellas"><i class="fa-solid fa-star"></i></label>
                
                <input type="radio" id="star3" name="puntuacion" value="3">
                <label for="star3" title="3 estrellas"><i class="fa-solid fa-star"></i></label>
                
                <input type="radio" id="star2" name="puntuacion" value="2">
                <label for="star2" title="2 estrellas"><i class="fa-solid fa-star"></i></label>
                
                <input type="radio" id="star1" name="puntuacion" value="1">
                <label for="star1" title="1 estrella"><i class="fa-solid fa-star"></i></label>
            </div>
        </div>
        
        <label for="foto">{{ __('general.foto') }}</label>
        <input type="file" name="foto" id="foto" accept="image/*">
        
        <input type="hidden" value="{{ $pedido_id }}" name="pedido_id">
        
        <button type="submit">
            <i class="fas fa-paper-plane"></i>
            {{ __('general.enviar') }}
        </button>
    </form>
</div>
@endsection