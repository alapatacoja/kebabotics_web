<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $review->text = $request->get('text');
        $review->puntuacion = $request->get('puntuacion');
        $review->pedido_id = $request->get('pedido_id');

        
        // Obtener fecha del pedido
        $pedido = Pedido::find($review->pedido_id);
        $fecha = Carbon::parse($pedido->fecha)->format('Y-m-d');

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $name = $fecha . '_' . $review->pedido_id . '.png';
            $file->storeAs('/public/reviewfiles/' . $name);
        }
        $review->save();
        return redirect()->route('home');
    }

}
