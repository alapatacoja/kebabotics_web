<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Pedido;
use Carbon\Carbon;
class ReviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($pedido_id)
    {
        return view('reviews.create', compact('pedido_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->nombre = $request->get('nombre');
        $review->comentario = $request->get('text');
        $review->puntuacion = $request->get('puntuacion');
        $review->pedido_id = $request->get('pedido_id');

        
        $pedido = Pedido::find($review->pedido_id);

        if ($pedido) {
            $fecha = Carbon::parse($pedido->fecha)->format('Y-m-d');
        } else {
            $fecha = 'Fecha desconocida'; // O pon un valor por defecto
        }

        if($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $name = $fecha . '_' . $review->pedido_id . '.png';
            $file->storeAs('/public/reviewfiles/' . $name);
        }

        $review->save();
        return redirect()->route('home');
    }

}
