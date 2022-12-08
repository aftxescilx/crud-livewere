<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BeneficiarioFactory extends Factory
{
    protected $model = Beneficiario::class;

    public function definition()
    {
        return [
			'idBeneficiario' => $this->faker->name,
			'nombre' => $this->faker->name,
			'rfc' => $this->faker->name,
			'estatus' => $this->faker->name,
        ];
    }
}
