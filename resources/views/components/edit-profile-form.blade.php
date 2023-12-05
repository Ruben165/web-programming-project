<form class="edit-profile-form" method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <h1 class="edit-profile-form-title">编辑个人资料 | Edit Profile</h1>
    <div class="edit-profile-form-input-field">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="Min. 5 Characters, Max. 50 Characters">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="text" placeholder="Has to end with '@gmail.com'">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" type="text" placeholder="Must Contains 12 Numbers">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="address">Address</label>
        <input id="address" name="address" type="text" placeholder="Do not have to be filled, Min. 5 Characters">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="profile-picture">New Profile Image</label>
        <input id="profile-picture" name="profile-picture" accept="image/*" type="file" placeholder="Must Contains 12 Numbers">
    </div>
    <div class="edit-profile-form-input-field">
        <label for="current-password">Current Password</label>
        <input id="current-password" name="current-password" type="password"
            placeholder="Has to be the same with the previous password">
    </div>
    <div class="edit-profile-form-footer">
        <button class="edit-profile-form-submit-button" type="submit">Update Profile</button>
    </div>
</form>
