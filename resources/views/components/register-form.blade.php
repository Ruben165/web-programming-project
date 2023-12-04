<form class="register-form" method="POST" action="{{ route('createUser') }}">
    @csrf
    <h1 class="register-form-title">Register</h1>
    <div class="register-form-input-field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="text" placeholder="Has to end with '@gmail.com'" value="{{ old('email') }}">
    </div>
    <div class="register-form-input-field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Min. 5 Characters, Max. 50 Characters" value="{{ old('username') }}">
    </div>
    <div class="register-form-input-field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters" value="{{ old('password') }}">
    </div>
    <div class="register-form-input-field">
        <label for="confirm_password">Confirm Password</label>
        <input id="confirm_password" name="confirm_password" type="password" placeholder="Min. 5 Characters, Max. 255 Characters" value="{{ old('confirm_password') }}">
    </div>
    <div class="register-form-footer">
        <button class="register-form-submit-button" type="submit">Register</button>
        <div class="register-form-redirect-option">Already have an account? <a href="{{ route('login') }}">Log in</a></div>
    </div>
</form>
