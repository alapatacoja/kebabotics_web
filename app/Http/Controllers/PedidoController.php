<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Models\Pedido;
use App\Models\Kebab;
use Carbon\Carbon;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use App\Services\MqttService;


class PedidoController extends Controller
{
    public function index()
    {
        $max = session()->pull('max', false);
        return view('pedido.index', compact('max'));
    }



    public function add(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (count($carrito) >= 3) {
            return redirect()->route('pedido.index')->with('max', true);
        }

        $carrito[] = [
            'carne' => $request->carne,
            'lechuga' => 1,
            'tomate' => 1,
            'cebolla' => 1,
            'salsa' => 1,
            'picante' => 1,
            'precio' => 5,
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('pedido.index');
    }


    public function edit($kebab){
        
        $carrito = session()->get('carrito', []);

        if (count($carrito) >= 3) {
            return redirect()->route('pedido.index')->with('max', true);
        }

        return view('pedido.edit', compact('kebab'));
    }

    public function update(Request $request){
        $carrito = session()->get('carrito', []);

        if (count($carrito) >= 3) {
            return redirect()->route('pedido.index')->with('max', true);
        }

        $carrito[] = [
            'carne' => $request->carne,
            'lechuga' => $request->lechuga,
            'tomate' => $request->tomate,
            'cebolla' => $request->cebolla,
            'salsa' => $request->salsa,
            'picante' => $request->picante,
            'precio' => $request->precio
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('pedido.index');
    }

    public function carrito(){
        $carrito = session()->get('carrito', []);

        $total = 0;
        foreach($carrito as $kebab){
            $total += $kebab['precio'];
        }

        return view('carrito.index', compact('carrito', 'total'));
    }

    public function delete($kebab){
        $carrito = session()->get('carrito', []);

        unset($carrito[$kebab]);
        $carrito = array_values($carrito);

        session()->put('carrito', $carrito);

        return redirect()->route('pedido.carrito');
    }

    public function store(Request $request){
        $carrito = session()->get('carrito', []);

        $pedido = new Pedido();
        $pedido->numero_pedido = Pedido::max('numero_pedido') + 1;
        $pedido->estado = 'pagado';
        $pedido->fecha = now();
        $pedido->precio_total = $request->precio_total;
        $pedido->ventana_id = null;
        $pedido->save();

        foreach($carrito as $item){
            $kebab = new Kebab();
            $kebab->pedido_id = $pedido->id;
            $kebab->carne = $item['carne'];
            $kebab->lechuga = $item['lechuga'];
            $kebab->tomate = $item['tomate'];
            $kebab->cebolla = $item['cebolla'];
            $kebab->salsa = $item['salsa'];
            $kebab->picante = $item['picante'];
            $kebab->precio = $item['precio'];
            $kebab->save();
        }

        $pedido->load('kebabs');
        MqttService::publicarPedido($pedido);

        session()->forget('carrito');
        return redirect()->route('factura.mostrar', $pedido);
    }

    private function generarQrSiNoExiste(Pedido $pedido)
    {
        $fecha = Carbon::parse($pedido->fecha)->format('Y-m-d');
        $datosQr = [
            'numero_pedido' => $pedido->numero_pedido,
            'fecha' => $fecha,
        ];
        $contenidoQr = json_encode($datosQr);
        $qrRelativePath = "qrs/qr_{$fecha}_{$pedido->numero_pedido}.png";

        if (!Storage::disk('public')->exists($qrRelativePath)) {
            $qrImage = QrCode::format('png')->size(150)->generate($contenidoQr);
            Storage::disk('public')->put($qrRelativePath, $qrImage);
        }

        return $qrRelativePath;
    }

    public function mostrarFactura(Pedido $pedido)
    {
        $aux = $this->generarQrSiNoExiste($pedido);
        $qr = asset("storage/{$aux}");

        return view('factura.mostrar', compact('pedido', 'qr'));
    }

    public function descargarFactura($id)
    {
        $pedido = Pedido::with('kebabs')->findOrFail($id);
        $url = $this->generarQrSiNoExiste($pedido);
        $qrurl = storage_path("app/public/{$url}");
        $pdf = Pdf::loadView('factura.pdf', compact('pedido', 'qrurl'));
        
        return $pdf->download("kebabotics_factura_{$pedido->numero_pedido}.pdf");
    }
}
