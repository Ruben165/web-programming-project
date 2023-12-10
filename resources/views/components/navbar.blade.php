<link rel="stylesheet" href="{{ asset('css/public/navbar.css') }}">
<link rel="icon" href="{{ asset('images\icon.png') }}"/>
<header class="navbar">
    <div class="navbar-section-left">
        <div class="navbar-brand">
            <x-rpg-knife-fork class="navbar-brand-logo" />
            <div class="navbar-brand-name">XiAO DiNG DoNG</div>
        </div>
        <div class="navbar-links">
            <a href="{{ route('home') }}">Home</a>
            @if(auth()->check() && auth()->user()->role == 'member')
                <a href="{{ route('search') }}">Search Food</a>
                <a href="{{ route('cart') }}">Cart</a>
            @elseif(auth()->check() && auth()->user()->role == 'admin')
                <a href="{{ route('returnAddMenu') }}">Add Food</a>
                <a href="{{ route('returnManageMenu') }}">Manage Food</a>
            @endif
        </div>
    </div>
    <div class="navbar-section-right">
        @if (auth()->check())
            <div class="navbar-authenticated-section">
                <div>Welcome, {{ auth()->user()->username }}</div>
                <div id="navbar-authenticated-section-menu-button" class="navbar-authenticated-menu-button">
                    @if (auth()->user()->profile_picture)
                        <img
                            alt="User Profile Picture"
                            class="navbar-authenticated-section-user-icon"
                            src={{ asset('storage/' . str_replace('public/', '', auth()->user()->profile_picture)) }}
                        />
                    @else
                        <x-bi-person-circle class="navbar-authenticated-section-user-icon" />
                    @endif
                    <x-go-triangle-down-16 class="navbar-authenticated-section-triangle-down" />
                </div>
                <div id="navbar-authenticated-section-dropdown-menu" class="navbar-authenticated-section-dropdown-menu">
                    <a href="{{ route('profile') }}">Profile</a>
                    <a href="{{ route('transactions') }}">Transaction History</a>
                    <a href="{{ route('deauthenticateUser') }}">Sign Out</a>
                </div>
            </div>
        @else
            <div class="navbar-not-authenticated-section">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/public/navbar.js') }}"></script>
</header>
