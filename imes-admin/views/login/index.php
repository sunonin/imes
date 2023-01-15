<form id="formAuthentication" class="mb-3" action="route/post-login.php" method="POST">
  <div class="mb-3">
    <label for="email" class="form-label">Username</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="username"
      placeholder="Enter your email or username"
      autofocus
    />
  </div>
  <div class="mb-3 form-password-toggle">
      <div class="d-flex justify-content-between">
        <label class="form-label" for="password">Password</label>
      </div>
    <div class="input-group input-group-merge">
      <input
        type="password"
        id="password"
        class="form-control"
        name="password"
        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
        aria-describedby="password"
      />
      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
    </div>
  </div>
  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="showpassword" onclick="myFunction()"/>
      <label class="form-check-label" for="showpassword"> Show Password</label>
    </div>
  </div>
  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
  </div>
</form>