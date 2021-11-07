<?php

namespace Tests\Unit;

use App\Http\Services\GuardService;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testChangeUserPassword()
    {
        $user = User::factory()->create();
        $userData = [
            'password' => 'Test1234$',
            'password_confirmation' => 'Test1234$',
        ];
        $response = $this->actingAs($user)
                ->json('PUT', 'panel/user/'.$user->id.'/edit', $userData, ['Accept' => 'application/json']);
        $response->assertSessionHas('toastr::messages.0.type', 'success');
    }

    public function testAddUserPassword(){
        $user = User::factory()->create();
        $userData = [
            'name' => 'FB Password',
            'login' => $user->name,
            'password' => 'Haslo123',
            'web_address' => 'https://facebook.com',
            'description' => 'Haslo do FB',
        ];
        $response = $this->actingAs($user)
            ->json('POST', 'panel/passwords/create', $userData, ['Accept' => 'application/json']);
        $userPassword = UserPassword::where('user_id', $user->id)->first();
        $decryptedStoredPassword = GuardService::decryptPassword($user->password,$userPassword->password);
        if($decryptedStoredPassword === $userData['password']){
            $response->assertSessionHas('toastr::messages.0.type', 'success');
        }else{
            $this->assertTrue(false);
        }
    }
}
