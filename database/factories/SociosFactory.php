<?php

namespace Database\Factories;

use App\Models\Socios;
use Illuminate\Database\Eloquent\Factories\Factory;

class SociosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Socios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        'telefono' => $this->faker->word,
        'direccion' => $this->faker->word,
        'fecha_nacimiento' => $this->faker->word,
        'ocupacion' => $this->faker->word,
        'correo_electronico' => $this->faker->word,
        'tipo' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
