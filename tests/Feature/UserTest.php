<?php

namespace Tests\Feature;

use App\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.connections.landlord' => [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ],

            'database.connections.tenant' => [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ]
        ]);

        $this->artisan('migrate --database=landlord --path=database/migrations/landlord');
        $this->artisan('migrate --database=tenant');

        $this->app[Kernel::class]->setArtisan(null);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_login_fails_with_invalid_password()
    {
        $login_data = [
            "login" => 'admin@saas.com',
            "password" => '1234'
        ];

        $response = $this->post('/api/auth/login', $login_data);

        $response->assertStatus(422);
    }

    public function test_login_fails_with_invalid_email()
    {
        $login_data = [
            "email" => 'admin',
            "password" => '123456'
        ];

        $response = $this->post('/api/auth/login', $login_data);

        $response->assertStatus(422);
    }

    public function test_register_fails_with_empty_name()
    {
        $login_data = [
            "name" => '',
            "email" => 'teste@saas.com',
            "password" => '123456'
        ];

        $response = $this->post('/api/auth/register', $login_data);

        $response->assertStatus(400);
    }

    public function test_register_fails_with_invalid_email()
    {
        $login_data = [
            "name" => 'teste',
            "email" => 'teste',
            "password" => '123456'
        ];

        $response = $this->post('/api/auth/register', $login_data);

        $response->assertStatus(400);
    }

    public function test_register_fails_with_invalid_password()
    {
        $login_data = [
            "name" => 'teste',
            "email" => 'teste@saas.com',
            "password" => '1'
        ];

        $response = $this->post('/api/auth/register', $login_data);

        $response->assertStatus(400);
    }

    public function test_register_account_and_login()
    {
        $register_data = [
            "name" => 'Admin',
            "email" => 'admin@saas.com',
            "password" => '123456'
        ];
        
        $response_register = $this->post('/api/auth/register', $register_data);

        $response_register->assertStatus(201);

        $login_data = [
            "email" => 'admin@saas.com',
            "password" => '123456'
        ];

        $response_login = $this->post('/api/auth/login', $login_data);

        $response_login->assertStatus(200);
    }
}
