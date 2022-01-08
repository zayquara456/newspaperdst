<div class="container" style="max-width: 500px">
    <form method="post" action="">
        <h2>Đăng nhập</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Nhập tài khoản" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" id="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" placeholder="Nhập mật khẩu" name="password" value="" id="password" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary"/>
            <p>
                Bạn muốn làm cộng tác viên cho trang, <a href="index.php?controller=login&action=register">Đăng ký</a> ngay
            </p>
        </div>
    </form>
</div>