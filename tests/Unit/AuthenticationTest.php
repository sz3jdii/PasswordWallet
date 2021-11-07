<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
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
            "email" => "doe@example.com",
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
            "email" => "do2ee@example.com",
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ];

        $this->json('POST', 'guard/checkRegister', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201);
    }
}
