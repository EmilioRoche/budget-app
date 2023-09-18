<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    //finish up later
    public function test_expense_store(): void
    {
        $user = User::factory()->create();
    }
}

