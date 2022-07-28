<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_password_will_be_hashed()
    {
        Hash::shouldReceive('make')->once()->andReturn('hashed');

        $user = new User([
            'name' => 'User',
            'password' => 'rawpassword',
        ]);

        $this->assertEquals('hashed', $user->password);
    }


    public function test_password_will_not_be_hashed_if_empty($password = '')
    {
        $user = new User([
            'name' => 'User',
            'password' => $password
        ]);

        $this->assertNull($user->password);
    }

    public function test_user_email_is_verified()
    {
        $user = new User();
        $user->email_verified_at = now();

        $this->assertTrue($user->hasVerifiedEmail());
    }

    public function test_user_email_is_not_verified()
    {
        $user = new User();

        $this->assertFalse($user->hasVerifiedEmail());
    }
}
