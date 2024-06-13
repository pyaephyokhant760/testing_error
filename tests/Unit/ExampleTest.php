<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     *
     */
    public function test_check_if_user_insert_into_db(): void
    {
        $userRespon = ['name' => 'roger' , 'value' => 1];
        $this->assertEquals(1 ,$userRespon['value']);
        $this->assertArrayHasKey('name' ,$userRespon);

    }

    /**
     * Check if users getting fetched with id.
     */
    public function test_check_if_users_getting_fetched_with_id(): void
    {
        User::factory(10)->create();
    }
}
