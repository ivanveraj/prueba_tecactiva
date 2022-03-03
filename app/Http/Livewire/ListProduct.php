<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
 
class ListProduct extends Component
{
    protected $listeners=['render'=>'render','delete'];
    public function render()
    {
        $products=Product::all();
        return view('livewire.list-product',compact('products'));
    }
    /**Elimina el permiso seleccionado: El llamado se realiza mediante ajax */
    public function delete($product_id)
    {
        Product::where('id_product',$product_id)->delete();
    }
}