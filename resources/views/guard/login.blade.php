@extends('layouts.site.app')

@section('content')
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h3>Password Wallet</h3>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{route('guard.checkLogin')}}" enctype="multipart/form-data">
            @csrf
            <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" value="{{old('login')}}" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>

@endsection
