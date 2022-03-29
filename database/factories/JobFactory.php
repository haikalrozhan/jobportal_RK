<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'title' => $title = $this->faker->text,
            'slug' =>Str::slug($title),
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'category_id' => rand(1,5),
            'type' => 'fulltime',
            'status' => rand(0,1),
            'description' => $this->faker->paragraph(rand(2,10)),
            'last_date' => $this->faker->DateTime
        ];
    }
}
