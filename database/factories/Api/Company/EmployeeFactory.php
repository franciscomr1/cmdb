<?php

namespace Database\Factories\Api\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Api\Company\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id'=>fake()->numberBetween(1,9),
            'position_id'=> fake()->numberBetween(1,30),
            'name' => fake()->firstName('male'|'female'),
            'first_surname'=>fake()->lastName() ,
            'second_surname'=>fake()->lastName() ,
            'employee_id_number'=>fake()-> numberBetween(100, 99999),
            'hire_date' => fake()->date('Y-m-d'),
            'is_active' => fake()->boolean(),
            'created_by' => fake()->name(),
            'updated_by' => fake()->name(),
        ];
    }
}
