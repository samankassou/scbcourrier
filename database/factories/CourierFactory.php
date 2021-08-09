<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Courier;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Courier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender' => $this->faker->name(),
            'object' => $this->faker->paragraph(2),
            'recipient_id' => User::all()->random()->id,
            'category_id' => 1,
            'status' => $this->faker->randomElement(['reçu', 'traité', 'rejeté']),
            'created_by' => 1,
        ];
    }
}
