<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'    => $this->faker->name,
            'last_name'     => $this->faker->lastName,
            'email'         => $this->faker->unique()->safeEmail,
            'country'       => $this->faker->country,
            'username'      => $this->faker->userName,
            'gender'        => $this->faker->randomElement(['male', 'female']),
            'city'          => $this->faker->city,
            'phone'         => $this->faker->phoneNumber,
        ];
    }
}
