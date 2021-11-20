<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class InstitutionTest extends TestCase
{
    use RefreshDatabase;

    public function test_institution_is_status_code_200()
    {
        Artisan::call('db:seed');
        $response = $this->get('/api/v1/institutions');
        $response->assertStatus(200);
    }
}
