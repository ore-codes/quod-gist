<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    /** @test */
    public function get_all_servers_succeeds()
    {
        $response = $this->get(route('servers.index'));

        $response->assertStatus(302);
    }
}
