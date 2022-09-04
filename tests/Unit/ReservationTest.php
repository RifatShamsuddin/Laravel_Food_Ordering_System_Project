<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ReservationTest extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_reservation_create()
    {
        $user = User::factory()->create();

        $response = $this->post('saveReservation', [
            'reservation_name' => 'name',
            'reservation_phone' => '4564656',
            'reservation_details' => 'Somethng Something',
            'reservation_date' => '1/1/2025',
            'customer_id' => $user->user_id,
        ]);

        $response->assertStatus($response->status(), 302);
    }
}
