<?php

namespace App\Http\Services;

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
        $encryptedPassword = '';
        if($this->encryptionType == 'SHA512'){
            $encryptedPassword = hash('sha512', $this->pepper.$this->salt.$this->password);
        }else{
            $encryptedPassword = hash_hmac(); //TODO

        }
        return $encryptedPassword;
    }
}
