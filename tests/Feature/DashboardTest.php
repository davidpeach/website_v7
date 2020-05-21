<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_authed_me_can_access_my_dashboard()
    {
        $this->signIn();

        $this->get(route('dashboard'))
            ->assertStatus(200);
    }

    /** @test */
    public function guests_can_not_access_my_dashboard()
    {
        $this->withExceptionHandling();

        $this->get(route('dashboard'))
            ->assertRedirect('/');
    }

}
