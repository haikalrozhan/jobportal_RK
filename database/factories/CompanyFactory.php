<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'cname' => $name = $this->faker->company,
            'slug' => Str::slug($name),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => 'avatar/man.jpg',
            'cover_photo' => 'cover/tumblr-image-sizes-banner.png',
            'slogan' => 'learn earn and grow',
            'description' => $this->faker->paragraph(rand(2,10))
        ];
        
    }
}
