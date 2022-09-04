<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Dish;
use App\Models\cart;
use App\Models\User;

class DishTest extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_dish_create()
    {
        $user = User::factory()->create();

        $response = $this->post('/dish/save', [
            'dish_name' => 'name',
            'dish_detail' => 'detail of dish',
            'dish_image' => 'image of dish',
            'dish_status' => '0',
            'dish_price' => '200',
            'restaurant_id' => $user->user_id,
        ]);
        $response->assertStatus($response->status(), 302);
    }
    public function test_dish_delete()
    {

        $dish = Dish::factory()->create();
        $response = $this->get(route('dish_delete', [$dish->dish_id]));
        $this->assertModelMissing($dish);
    }

    public function test_dish_edit()
    {
        $dish = Dish::factory()->create();
        $response = $this->get(route('dish_edit', [$dish->dish_id]));
        $response->assertStatus($response->status(), 302);
    }

    public function test_cart()
    {
        $user = User::factory()->create();
        $dish = Dish::factory()->create();
        $cart = cart::factory()->create([
            'dish_id' => $dish->dish_id,
            'user_id' => $user->user_id,
            'quantity' => 1,
        ]);
        $response = $this->get(route('addcart', [$dish->dish_id]));
        $response->assertStatus($response->status(), 302);
    }

    public function test_dishModel()
    {
        $dish = Dish::factory()->create();
        $this->assertModelExists($dish);
    }
}
