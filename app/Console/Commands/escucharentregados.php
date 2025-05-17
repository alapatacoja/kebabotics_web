<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use App\Models\Pedido;

class escucharentregados extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:escucharentregados';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'actualizar la base de datos cuando se entrega un pedido';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $server = '10.236.13.247';
        $port = 1883;
        $clientId = 'laravel-' . uniqid();

        $mqtt = new MqttClient($server, $port, $clientId);
        $settings = new ConnectionSettings();

        $mqtt->connect($settings, true);

        $mqtt->subscribe('kebabotics/entregados', function (string $topic, string $message) {
            $this->info("Mensaje recibido: {$message}");

            $data = json_decode($message, true);

            if (!isset($data['numero_pedido']) || !isset($data['ventana'])) {
                $this->error("Mensaje inválido: faltan campos");
                return;
            }

            $pedido = Pedido::where('numero_pedido', $data['numero_pedido'])->first();

            if (!$pedido) {
                $this->error("Pedido no encontrado: " . $data['numero_pedido']);
                return;
            }

            $pedido->estado = 'entregado';
            $pedido->ventana_id = $data['ventana'];  

            $pedido->save();

            $this->info("Pedido {$pedido->numero_pedido} actualizado como ENTREGADO por ventana {$data['ventana']}.");
        }, 0);

        $this->info("Escuchando mensajes MQTT en 'kebabotics/entregados'...");

        $mqtt->loop(true);
    }
}
