<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantTest extends TestCase
{

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     config([
    //         'database.connections.landlord' => [
    //             'driver' => 'sqlite',
    //             'database' => ':memory:'
    //         ],

    //         'database.connections.tenant' => [
    //             'driver' => 'sqlite',
    //             'database' => ':memory:'
    //         ]
    //     ]);

    //     $this->artisan('migrate --database=landlord --path=database/migrations/landlord');
    //     $this->artisan('migrate --database=tenant');

    //     $this->app[Kernel::class]->setArtisan(null);
    // }

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
