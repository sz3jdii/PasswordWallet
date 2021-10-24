@extends('layouts.panel.app')

@section('content')
    <div id="formContent">
        <!-- Tabs Titles -->

        <div class="fadeIn first">
            <h3>Hello {{Auth::user()->name}}</h3>
        </div>

        <div>
            <span>Here are your passwords:</span>
        </div>
        <div class="panel-table">
            <table>

                <thead>
                    <th>Name</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Description</th>
                    <th>Web address</th>
                    <th>Created at</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    @foreach($passwords as $password)
                        <tr>
                            <td>{{$password->name ?? '-'}}</td>
                            <td>{{$password->login ?? '-'}}</td>
                            <td>{{$password->password ?? '-'}}</td>
                            <td>{{$password->description ?? '-'}}</td>
                            <td>{{$password->web_address ?? '-'}}</td>
                            <td>{{$password->created_at->format('Y-m-d') ?? '-'}}</td>
                            <td>
                                <a href="{{route('panel',$password)}}">
                                    Decrypt
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <a class="button" href="{{route('panel.passwords.create')}}">Add new</a>
            </div>
        </div>
    </div>
@endsection
