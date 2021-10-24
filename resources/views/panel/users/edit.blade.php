@extends('layouts.panel.app')

@section('content')
    <div id="formContent">
        <div>
            <span>Please fill up the form in order to change your password:</span>
        </div>
        <div class="panel-table">
            <form action="{{route('panel.users.update', $user)}}" class="form-default" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @include('panel.users._form')
                <div>
                    <button class="button" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection
