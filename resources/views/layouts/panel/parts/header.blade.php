<div class="filter-div">
    <div class="navbarDiv">
        <nav id="navbar">
            <div>
                <a href="{{route('panel')}}">
                    <h4>Password Wallet</h4>
                </a>
            </div>
            <div id="profile">
                <a class="dropdown-item" href="{{route('panel.users.edit', Auth::user()->id)}}">Change password</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>
    </div>
</div>
