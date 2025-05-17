<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Illuminate\Support\Facades\Log;

class MqttService
{
    public static function publicarPedido($pedido)
    {
        $server = '10.236.13.247';
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
            ];
        });

        $datos = [
            'numero_pedido' => $pedido->numero_pedido,
            'cantidad_kebabs' => $kebabs->count(),
            'kebabs' => $kebabs,
        ];

        $mqtt->publish('kebabotics/pedidos', json_encode($datos), 0);

        $mqtt->disconnect();
    }
}
