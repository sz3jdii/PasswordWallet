@extends('layouts.panel.app')

@section('content')
    <div id="formContent">
        <div>
            <span>Please fill up the form in order to add new password to wallet:</span>
        </div>
        <div class="panel-table">
            <form action="{{route('panel.passwords.store')}}" class="form-default" method="POST" enctype="multipart/form-data">
                @include('panel.passwords._form')
                <div>
                    <button class="button" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection
