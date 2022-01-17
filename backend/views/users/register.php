<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>News</b>DST</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Đăng kí cho cộng tác viên</p>

      <form method="post" action="">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Tên tài khoản" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" id="username" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" name="email" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirm" id="password-confirm" value="<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" value="Đăng ký" class="btn btn-primary btn-block">Đăng kí</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="index.php?controller=login&action=login" class="text-center">Đăng nhập ngay</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>