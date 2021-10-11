@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h5>Error!</h5>
        <ul>
            @foreach ($errors->all() as  $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
