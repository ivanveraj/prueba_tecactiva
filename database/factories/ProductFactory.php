<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        return [
            'nombre_product' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(10),
            'precio' => $this->faker->numberBetween(100, 2000),
            'estado' => $this->faker->numberBetween(0, 1),
            'fecha_publicacion' => date("Y-m-d H:i"),
        ];
    }
}
