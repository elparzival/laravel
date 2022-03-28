<?php

namespace Database\Factories;

use App\Models\Audiencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class audienciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Audiencia::class;

    public function definition()
    {
        return [
            'ruc' => $this->faker->swiftBicNumber(),
            'fiscal' => $this->faker->firstName(),
            'fiscalia' => $this->faker->randomElement(['Rancagua','San Vicente','Rengo', 'Pichilemu']),
            'direccion_delito' => $this->faker->streetAddress(),
            'comuna_delito' => $this->faker->citySuffix(),
            'nro_parte' => $this->faker->randomDigit(),
            'fec_parte' => $this->faker->dateTime(),
            'hechos' => $this->faker->paragraph(),
            'comisaria' => $this->faker->streetName(),
            'fun_denuncia' => $this->faker->firstName(),
            'fec_recepcion' => $this->faker->dateTime(),
            'fec_hecho' => $this->faker->dateTime(),
            'username' => $this->faker->firstName()
        ];
    }
}
