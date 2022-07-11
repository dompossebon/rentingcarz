<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function only_logged_users_can_see_games_list()
    {
        $response = $this->get('/index');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
