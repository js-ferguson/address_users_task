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

    public function test_user_can_update_address()
    {
        // $user = User::factory()->create([
        //     'password' => bcrypt('password')
        // ]);

        $user = User::find(12);

        $address = Address::factory()->create(['user_id' => $user->id]);
        
        $response = $this->actingAs($user)->post('/api/addresses/update', [
            'line1'  => 'test update address',
            'line2' => 'Suite 1',
            'line3' => 'Industrial Testing Park',
            'line4' => 'Complex X',
            'city' => 'Lismore',
            'postalCode' => '2480',
            'stateCode' => 'NSW',
            'stateName' => 'New South Wales',
            'countryCode' => 'AU',
            'id' => $address->id,
        ]);
        $response->assertSessionHasNoErrors();
        $this->assertEquals('test update address', Address::find($address->id)->line1);
    }

    // public function test_admin_can_delete_product()
    // {
    //     $admin = User::factory()->create(['is_admin' => 1]);
    //    $product =  Product::factory()->create();
    //    $this->assertEquals(1, Product::count());
    //    $response = $this->actingAs($admin)->delete('/products/'. $product->id);
    //    $response->assertStatus(302);
    //    $this->assertEquals(0, Product::count());
    // }
}
