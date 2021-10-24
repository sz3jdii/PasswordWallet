@extends('layouts.site.app')

@section('content')
    @guest
        <div id="formContent">
            <!-- Tabs Titles -->

            <div class="fadeIn first">
                <h3>Password Wallet</h3>
            </div>

           <div>
               Hello! To use the Password Wallet you need to log in first.
               <br>
               <a href="{{route('guard.login')}}">Log in!</a>
               <br>
               Don't have an account?
               <br>
               <a href="{{route('guard.register')}}">Sign up!</a>
           </div>

        </div>
    @endguest
@endsection
