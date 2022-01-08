<div class="container" style="max-width: 500px">
    <form method="post" action="">
        <h2>Đăng kí cho cộng tác viên</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Nhập tài khoản" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" id="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" id="password" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password-confirm">Nhập lại password</label>
            <input type="password" placeholder="Nhập lại mật khẩu" name="password_confirm" value="<?php echo isset($_POST['password_confirm']) ? $_POST['password_confirm'] : ''; ?>" id="password-confirm" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="email">Nhập email</label>
            <input type="email" name="email" placeholder="Địa chỉ email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="email" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary"/>
            <p>
                Đã có tài khoản, <a href="index.php?controller=login&action=login">Đăng nhập</a> ngay
            </p>
        </div>
    </form>
</div>