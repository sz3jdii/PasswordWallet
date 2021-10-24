<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GuardService{

    protected $encryptionType;
    protected $pepper = '';
    protected $salt = '';
    protected $password = '';


    public function __construct(string $encryptionType, string $password){
        $this->encryptionType = $encryptionType;
        $this->pepper = config('authSharedKey');
        $this->password = $password;
    }
    public function getEncryptionType(): string{
        return $this->encryptionType;
    }
    public function generateSalt(): string{
        $this->salt = Str::random(16);
        return $this->salt;
    }
    public function generatePassword(): string{
        if($this->encryptionType == 'SHA512'){
            $encryptedPassword = hash('SHA512', $this->pepper.$this->salt.$this->password);
        }else{
            $encryptedPassword = hash_hmac('SHA512', $this->password,  $this->pepper);
        }
        return $encryptedPassword;
    }
    public static function checkPasswords(string $password, string $hash, string $salt, string $encryptionType): bool{
        $pepper = config('authSharedKey');
        if($encryptionType == 'SHA512'){
            $encryptedPassword = hash('SHA512', $pepper.$salt.$password);
        }else{
            $encryptedPassword = hash_hmac('SHA512', $password, $pepper);
        }
        return hash_equals($hash, $encryptedPassword);
    }
    public static function decryptPassword(User $user, string $password): string{
        return str_replace($user->password, '' ,Crypt::decryptString($password));
    }
    public static function encryptPassword(User $user, string $password): string{
        return Crypt::encryptString($user->password.$password);
    }
}
