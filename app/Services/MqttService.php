<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Support\Facades\Log;

class MqttService
{
    public static function publicarPedido($pedido)
    {
        $server = 'localhost';
        $port = 1883;
        $clientId = 'laravel-' . uniqid();

        $mqtt = new MqttClient($server, $port, $clientId);
        $settings = new ConnectionSettings();

        
        $mqtt->connect($settings, true);

        $kebabs = $pedido->kebabs->map(function ($kebab) {
            return [
                'carne' => $kebab->carne,
                'lechuga' => $kebab->lechuga,
                'tomate' => $kebab->tomate,
                'cebolla' => $kebab->cebolla,
                'salsa' => $kebab->salsa,
                'picante' => $kebab->picante,
            ];
        });

        $datos = [
            'numero_pedido' => $pedido->numero_pedido,
            'cantidad_kebabs' => $kebabs->count(),
            'kebabs' => $kebabs,
        ];

        $mqtt->publish('pedidos', json_encode($datos), 0);

        $mqtt->disconnect();
    }
}
