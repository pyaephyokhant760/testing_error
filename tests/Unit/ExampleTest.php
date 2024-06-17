<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ExampleTest extends TestCase
{
    use RefreshDatabase;
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

        $user = User::get();
        // dd($user->toArray());

        // $this->assertEquals(9,$user);
        $this->assertArrayHasKey(9,$user);
        $this->assertCount(10,$user);
        $this->assertGreaterThan(5 ,count($user));
    }

    /**
     * test_perticular_user_is_present_in_database.
     */

    public function test_perticular_user_is_present_in_database(): void
    {
        User::factory(1)->create(
            ["name" => "Pyae Phyo Khant"]
        );
        User::factory(10)->create();
        $user = User::get();
        // $userSingle = User::where('name','Pyae Phyo Khant')->get();

        $this->assertEquals(11 , count($user));

        $this->assertTrue($user->contains(function($item,$key) {
            return $item->name == "Pyae Phyo Khant";
        }));

    //    $this->assertObjectHasProperty('name',$user[0]);
    }
}
