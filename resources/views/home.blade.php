@extends('layout')

@section('content')
    <div class="imageninicio">
        <video autoplay loop muted plays-inline class="backvideo">
            <source src="{{ asset('imgs/video.mp4') }}" type="video/mp4">
        </video>

        <div class="content">
            <h1>{{ __('general.slogan') }}</h1>
            <a href="{{ route('pedido.index') }}">
                {{ __('general.pedir') }}
            </a>
        </div>
    </div>

    @include('partials.instrucciones')

    <section class="reviews">
        <h2 class="rev-titulo">{{ __('general.clientes') }}</h2>
        <div class="rev-grid">
            @foreach ($reviews as $review)
                <div class="rev-cuadro">
                    <div class="textreview">
                        <p class="nombre">{{ $review->nombre }}</p>
                        <p class="rev-estrellas">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $review->puntuacion)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </p>
                        <p class="comentario">{{ $review->comentario }}</p>
                    </div>
                    @if (Storage::exists('/public/reviewfiles/' . $review->pedido->fecha . '_' . $review->pedido_id . '.png'))
                        <div class="revimg">
                            <img src="{{ asset('storage/reviewfiles/' . $review->pedido->fecha . '_' . $review->pedido_id . '.png') }}"
                                alt="Reseña de {{ $review->nombre }}">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection