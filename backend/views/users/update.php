<?php if($_SESSION['user']['level'] == 1) { ?>
<?php if (empty($user)): ?>
    <h2>Không tồn tại người dùng này</h2>
<?php else: ?>
<div class="card card-primary">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Cập nhật thông tin người dùng #<?php echo $user['username'] ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                    <label for="username">Username <span class="red">*</span></label>
                    <input type="text" name="username" id="username"
                           value="<?php echo isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" disabled
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="first_name">First_name</label>
                    <input type="text" name="first_name" id="first_name"
                           value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'] ?>"
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="last_name">Last_name</label>
                    <input type="text" name="last_name" id="last_name"
                           value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'] ?>"
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone"
                           value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'] ?>"
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                           value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>"
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"
                           value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address'] ?>"
                           class="form-control"/>
                    </div>
                    <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" value="" class="form-control"/>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                    <?php endif; ?>
                    </div>
                <div class="form-group">
                    <label for="jobs">Jobs</label>
                    <input type="text" name="jobs" id="jobs"
                           value="<?php echo isset($_POST['jobs']) ? $_POST['jobs'] : $user['jobs'] ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook"
                           value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : $user['facebook'] ?>"
                           class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" class="form-control" id="status">
                        <?php
                        $selected_active = '';
                        $selected_disabled = '';
                        if (isset($user['status'])) {
                            switch ($user['status']) {
                                case 0:
                                    $selected_disabled = 'selected';
                                    break;
                                case 1:
                                    $selected_active = 'selected';
                                    break;  } } ?>
                        <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                        <option value="1" <?php echo $selected_active ?>>Active</option>
                    </select>
                </div>
                 <div class="form-group">
                    <?php
                        $selected_1 = '';$selected_2 = '';$selected_3 = '';
                        if (isset($user['level'])) {
                            switch ($user['level']) {
                                case 1:
                                    $selected_1 = 'selected';
                                    break;
                                case 2:
                                    $selected_2 = 'selected';
                                    break;
                                case 3:
                                    $selected_3 = 'selected';
                                    break;  } } ?>
                    <label for="level">Phân quyền</label>
                    <select name="level" class="form-control" id="level">
                        <option value="0">Người dùng</option>
                        <option value="1" <?php echo $selected_1; ?>>Người quản trị</option>
                        <option value="2" <?php echo $selected_2; ?>>Biên tập viên</option>
                        <option value="3" <?php echo $selected_3; ?>>Tác giả</option>
                    </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                  <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=user&action=index">Quay lại</a>
                </div>
              </form>
            </div>
            <?php endif; ?>
<?php } else echo '<h3>Bạn không có quyền truy cập vào đây</h3>'; ?>