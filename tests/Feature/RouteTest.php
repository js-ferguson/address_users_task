<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * Test the routes
     *
     * @return void
     */
    public function test_the_home_route_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertSee('IvvyTask');

        $response->assertStatus(200);
    }
    
    public function test_the_signup_route_returns_a_successful_response()
    {
        $response = $this->get('/signup');

        $response->assertStatus(200);
    }

    public function test_the_addresses_route_returns_a_successful_response()
    {
        $response = $this->get('/addresses');

        $response->assertStatus(200);
    }
    
}
