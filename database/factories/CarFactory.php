<?php

namespace Database\Factories;

use App\Models\Maker;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'maker_id' => Maker::inRandomOrder()->first()->id,
            'model_id' => function( array $attributes ) {
                return Model::where('maker_id', $attributes['maker_id'])
                    ->inRandomOrder()
                    ->first()
                    ->id;
            },
            'year' => fake()->year(),
            'price' => (int) fake()->randomFloat(2, 5, 100) * 1000,
            'vin' => strtoupper(Str::random(17)),

        ];
    }
}
