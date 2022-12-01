<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;

class AddressCrudTest extends TestCase
{
    /**
     * Test address creation feature.
     *
     * @return void
     */
    public function test_user_can_create_new_address()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password')
        ]);

        $response = $this->actingAs($user)->post('/api/addresses/create', [
            'line1' => '111 Test Ave',
            'line2' => 'Suite 1',
            'line3' => 'Industrial Testing Park',
            'line4' => 'Complex X',
            'city' => 'Lismore',
            'postalCode' => '2480',
            'stateCode' => 'NSW',
            'stateName' => 'New South Wales',
            'countryCode' => 'AU'
        ]);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('addresses', [
            'line1' => '111 Test Ave',
            'line2' => 'Suite 1',
            'line3' => 'Industrial Testing Park',
            'line4' => 'Complex X',
            'city' => 'Lismore',
            'postalCode' => '2480',
            'stateCode' => 'NSW',
            'stateName' => 'New South Wales',
            'countryCode' => 'AU'
        ]);
    }
}
