<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    use RefreshDatabase;
    //finish up later
    public function test_expense_store(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = [
            "expense" => [
                "name" => "wallet",
                "month" => "December",
                "year" => 2023,
                "type" => "personal",
                "recurring" => false,
                "price" => 2245
            ]
        ];
        $response = $this->post('/api/expense/store', $data);

        $response->assertStatus(201);
    }
}

