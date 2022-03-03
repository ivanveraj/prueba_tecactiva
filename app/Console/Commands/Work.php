<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Work extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecutando el schedule... Desarrollador po Ivan Vera';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fecha_publicacion = date("Y-m-d H:i");
        $precio = rand(100, 500);
        $estado = rand(0, 1);
        Product::create([
            'id_product' => uniqid(),
            'nombre_product' => 'Arroz-' . date("Y-m-d H:i"),
            'descripcion' => 'qwertyuiopasdfghjklñzxcvbnm',
            'precio' => $precio,
            'estado' => $estado,
            'fecha_publicacion' => $fecha_publicacion,
        ]);
        Storage::append("archivo.txt", $fecha_publicacion);
    }
}
