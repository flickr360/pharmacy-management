<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
$faker->addProvider(new \Bezhanov\Faker\Provider\Medicine($faker));

        return [
            'medicine_name' => $faker->medicine,
            'supplier' => fake()->company(),
            'quantity' => random_int(10,200),
            'unit_price' =>  fake()->randomFloat(2, 5, 1000),
        ];
    }
}
