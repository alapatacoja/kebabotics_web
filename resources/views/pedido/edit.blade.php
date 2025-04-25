@extends('layout')

@section('content')
    <form action="{{ route('pedido.update') }}" method="POST">
        @csrf
        <input type="hidden" name="carne" value="{{ $kebab }}">
        <div class="cuadro">
            <div class="img">
                <img src="{{ asset('imgs/' . $kebab . '.png') }}" alt="kebab de {{ $kebab }}">
            </div>
            <div class="contenido">
                <div class="superior">
                    <div>
                        <h2>{{ __('general.k' . $kebab) }}</h2>
                        <h3>{{ __('general.ingextra') }}</h3>
                    </div>
                    <div class="precio" id="precio">5€</div>
                </div>

                <div class="ingredientes">
                    @foreach (['lechuga', 'tomate', 'cebolla', 'salsa', 'picante'] as $ing)
                        <div class="ingrediente">
                            <img src="{{ asset('imgs/' . $ing . '.png') }}" alt="{{ $ing }}">
                            <span>{{ __('general.' . $ing) }}</span>
                            <button type="button" class="btn-cambio"
                                onclick="cambiarCantidad('{{ $ing }}', -1)">-</button>
                            <span id="cantidad-{{ $ing }}">1</span>
                            <button type="button" class="btn-cambio"
                                onclick="cambiarCantidad('{{ $ing }}', 1)">+</button>
                            <input type="hidden" name="{{ $ing }}" id="input-{{ $ing }}"
                                value="1">
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="preciohidden" value="5" name="precio">
                <button class="btn-aceptar" type="submit">{{ __('general.add') }}</button>
            </div>
        </div>
    </form>

    <script>
        const precioBase = 5;
    
        function cambiarCantidad(ing, cambio) {
            const cantidadSpan = document.getElementById('cantidad-' + ing);
            const input = document.getElementById('input-' + ing);
            let cantidad = parseInt(cantidadSpan.innerText) + cambio;
            if (cantidad < 0) cantidad = 0;
            cantidadSpan.innerText = cantidad;
            input.value = cantidad;
    
            calcularPrecio();
        }
    
        function calcularPrecio() {
            let extras = 0;
            @foreach (['lechuga', 'tomate', 'cebolla', 'salsa', 'picante'] as $ing)
                extras += Math.max(0, parseInt(document.getElementById('cantidad-{{ $ing }}').innerText) - 1);
            @endforeach

            // Actualizar precio en la vista
            const precioTotal = precioBase + extras;
            document.getElementById('precio').innerText = precioTotal + '€';
            
            // Pasar el precio al campo oculto
            document.getElementById('preciohidden').value = precioTotal;
        }
    
        document.addEventListener('DOMContentLoaded', calcularPrecio);
    </script>

@endsection


