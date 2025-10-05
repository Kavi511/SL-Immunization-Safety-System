<?php

namespace Database\Factories;

use App\Models\AdverseEffect;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdverseEffect>
 */
class AdverseEffectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AdverseEffect::class;
    public function definition()
    {
        return [
            'vaccination_records_id' => $this->faker->numberBetween(1, 100),
            'Description' => $this->faker->sentence,
            'Severity' => $this->faker->randomElement(['Mild', 'Moderate', 'Severe']),
            'reported_by' => 1, // Assuming a valid user ID exists
            'ReportedDate' => $this->faker->date,
        ];
    }
}
