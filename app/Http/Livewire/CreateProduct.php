<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class CreateProduct extends Component
{
    public $open = false;
    public $nombre_product, $descripcion, $precio, $estado;

    protected $rules = [
        'nombre_product' => 'required|max:50',
        'descripcion' => 'required|max:255',
        'precio' => 'required|numeric',
        'estado' => 'required|integer|size:1'
    ];
    public function render()
    {
        return view('livewire.create-product');
    }
    /*Funcion updated valida el formulario sin actualizar o enviar el modal */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**Funcion save: Valida y guarda el permiso creado, posteriormente, resetea las variables open
     * name y descripcion, y renderiza la vista
     */
    public function save()
    {
        $this->validate();
        Product::create([
            'nombre_product' => $this->nombre_product,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'estado' => $this->estado,
            'fecha_publicacion' => Carbon::now()
        ]);
        $this->reset(['open', 'nombre_product', 'descripcion', 'precio', 'estado']);
        $this->emit('render');
    }
}
