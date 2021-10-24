@extends('layouts.site.app')

@section('content')
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h3>Password Wallet</h3>
            <h5>Register</h5>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{route('guard.checkRegister')}}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" value="{{old('name')}}" placeholder="login" required>
            <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" value="{{old('email')}}" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="password" id="password_confirmation" class="fadeIn third" name="password_confirmation" placeholder="confirm password" required>
            <select name="encryption_type" id="encryption_type">
                <option value="" selected disabled>Please select encryption type...</option>
                <option value="SHA512" {{old("encryption_type") === "SHA512" ? "selected" : ""}}>SHA512</option>
                <option value="HMAC" {{old("encryption_type") === "HMAC" ? "selected" : ""}}>HMAC</option>
            </select>
            <input type="submit" class="fadeIn fourth" value="Sign up">
        </form>

        @include('guard._formFooter')

    </div>

@endsection
