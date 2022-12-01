<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'line1' => 'Mr. Nathen Stoltenberg',
            'line2' => 'Suite 1',
            'line3' => 'Industrial Testing Park',
            'line4' => 'Complex X',
            'city' => 'Lismore',
            'postalCode' => '2480',
            'stateCode' => 'NSW',
            'stateName' => 'New South Wales',
            'countryCode' => 'AU'
        ];
    }
}
