<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        User::factory(100)->create();
    }
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_if_user_with_specific_email_in_database(): void
    {
        $response = $this->post('/api/register');

        dd($response);
    }

    /**
     * check_if_we_have_under_age_clients.
     *
     * @test
     */
    public function check_if_we_have_under_age_clients(): void
    {
        $response = $this->get('/get_users_under_age');

        $this->assertGreaterThan(1,count($response->json()));
    }

}
