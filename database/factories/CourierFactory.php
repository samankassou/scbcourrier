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
            'date' => $this->faker->dateTimeBetween('-1 week'),
            'code' => $this->faker->unique()->numberBetween(100, 900),
            'sender' => $this->faker->name(),
            'object' => $this->faker->paragraph(2),
            'category_id' => 1,
            'status' => 'new',
            'comments' => $this->faker->paragraph(2),
            'created_by' => 1,
        ];
    }
}
