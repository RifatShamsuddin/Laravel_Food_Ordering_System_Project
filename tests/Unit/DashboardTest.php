<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public function test_home()
    {
        $response = $this->get(route('dashboard.home'));
        $response->assertOk();
        $response->assertViewIs('welcome');
    }
}
