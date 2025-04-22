@extends('layout')

@section('content')
<div class="imagen">
    <img src="imgs/kebab.jpg" alt="imagen kebab">
</div>

<section class="reviews">
    <h2 class="rev-titulo">{{ __('general.clientes') }}</h2>
    <div class="rev-grid">
        @foreach ($reviews as $review)
            <div class="rev-cuadro">
                <p><strong>{{$review->nombre}}</strong></p>
                <p>{{$review->comentario}}</p>
                <p class="rev-estrellas">
                    @for ($i=0; $i<5; $i++)
                        @if ($i < $review->puntuacion)
                        <i class="fa-solid fa-star"></i>
                        @else
                        <i class="fa-regular fa-star"></i>
                        @endif
                    @endfor
                </p>
            </div>
        @endforeach
    </div>
</section>
@endsection