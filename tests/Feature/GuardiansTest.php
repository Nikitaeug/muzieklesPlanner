<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuardiansTest extends TestCase
{
 public function test_guardians_screen_can_be_rendered()
    {
        $response = $this->get('/guardians');

        $response->assertStatus(200);
    }
}
