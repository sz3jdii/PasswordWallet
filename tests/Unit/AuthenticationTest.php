<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'guard/checkRegister', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "encryption_type" => ["The encryption type field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }

    public function testRepeatPassword()
    {
        $userData = [
            "encryption_type" => 'HMAC',
            "name" => "John Doe",
            "email" => $this->faker->unique()->safeEmail(),
            "password" => "demo12345"
        ];

        $this->json('POST', 'guard/checkRegister', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password and password confirmation must match."]
                ]
            ]);
    }

    public function testSuccessfulRegistration()
    {
        $userData = [
            "encryption_type" => 'HMAC',
            "name" => "John Doe",
            "email" => $this->faker->unique()->safeEmail(),
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ];

        $this->json('POST', 'guard/checkRegister', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }
}
