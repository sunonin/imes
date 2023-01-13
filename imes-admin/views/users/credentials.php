<div class="card">
  <h5 class="card-header">Credentials</h5>
  <div class="card-body">
    <div class="row">
      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-info">
          <h6 class="alert-heading fw-bold mb-1">Reminder:</h6>
          <p class="mb-0">Credentials will be sent to the user through the email provided below. A password will be generated automatically if not provided.</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="mb-3 col-md-5">
        <label for="userName" class="form-label">Username</label>
        <input class="form-control" type="text" id="userName" name="userName" value="<?= !empty($profile) ? $profile['username'] : '' ?>" placeholder = "Username"/>
      </div>

      <div class="mb-3 col-md-5">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" id="email" name="email" value="<?= !empty($profile) ? $profile['email'] : '' ?>" placeholder = "Email"/>
      </div>

    </div>
    <div class="row">
      <div class="mb-3 col-md-5">
        <label for="password" class="form-label">Password</label>
        <input class="form-control" type="password" id="password" name="password" value="" placeholder = "Password" />
      </div>

      <div class="mb-3 col-md-5">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input
          class="form-control"
          type="password"
          id="confirmPassword"
          name="confirmPassword"
          value=""
          placeholder = "Confirm Password"
        />
      </div>

    </div>
  </div>
</div>