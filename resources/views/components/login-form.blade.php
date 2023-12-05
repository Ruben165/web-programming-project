<form class="login-form" method="POST" action="{{ route('authenticateUser') }}">
    @csrf
    <h1 class="login-form-title">Login</h1>
    <div class="login-form-input-field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="text" placeholder="Has to end with '@gmail.com'" value="{{ old('email') }}">
    </div>
    <div class="login-form-input-field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters" value="{{ old('password') }}">
    </div>
    <div class="login-form-remember-me">
        <input id="remember-me" name="remember-me" type="checkbox">
        <label for="remember-me">Remember Me</label>
    </div>
    <div class="login-form-footer">
        <button class="login-form-submit-button" type="submit">Login</button>
        <div class="login-form-redirect-option">Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</form>
