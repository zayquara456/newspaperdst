 <div class="content-wrapper">
        <div class="content">
            <div class="signup-wrapper shadow-box">
                <div class="company-details ">
                  
                    <div class="shadow"></div>
                    <div class="wrapper-1">
                        <div class="logo">
       <div class="icon-food">
                    </div>
                        </div>
                        <h1 class="title"><a class="backhome" href="index.php">DST</a></h1>
                        <div class="slogan">Trang tin tức.</div>
                    </div>

                </div>
                <div class="signup-form ">
                    <div class="wrapper-2">
                        <div class="form-title">Đăng nhập!</div>
                        <div class="form">
                            <form action="" method="POST">
                                <p class="content-item">
                                    <label>Tài khoản
                                        <input type="text" name="username" placeholder="Tên tài khoản" value="<?php if(isset($_POST['username'])) echo $_POST['username']; else "" ?>" required>
                                    </label>
                                </p>

                                <p class="content-item">
                                    <label>Mật khẩu
                                        <input type="password"  placeholder="mật khẩu" name="password" required>
                                    </label>
                                </p>
                                <input type="checkbox" name="rememberLogin" value="" id="rememberLogin">
                                <label for="rememberLogin" style="margin-bottom: 0px">Remember login</label><br>


                                <input type="submit" name="login"  class="signup" value="Đăng nhập">
                                <a href="register.html" class="login">Đăng kí</a>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">