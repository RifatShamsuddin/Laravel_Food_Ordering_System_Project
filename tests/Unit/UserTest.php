<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_userModel()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
    }

    public function test_login()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_register()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_InvalidLogin()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'invalid'
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }

    public function test_Registration()
    {
        $response = $this->post('/register', [
            'name' => 'John',
            'email' => 'jd@gmail.com',
            'user_type' => 1,
            'password' => 'jd123456789',

        ]);
        $response->assertRedirect('/');
    }

    public function test_show_Restaurant()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('showRestaurants'));
        $response->assertSuccessful();
        $response->assertViewIs('customer.showRestaurants');
    }
}
