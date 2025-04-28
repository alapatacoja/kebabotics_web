<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::with('pedido')
                    ->latest()
                    ->take(6) // Mostrar 6 reviews
                    ->get();

        return view('home', compact('reviews'));
    }

    public function changelang($lang){
        if(array_key_exists($lang, Config::get('languages'))){
            Session::put('applocale', $lang);

        }
        return redirect()->back();
    }

    public function instrucciones()
    {
        return view('instrucciones');
    }

    public function sobrenosotros()
    {
        return view('sobrenosotros');
    }
}
