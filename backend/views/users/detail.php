<?php if($_SESSION['user']['level'] == 1) { ?>
<?php
require_once 'helpers/Helper.php';
?>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Thông tin chi tiết người dùng #<?php echo $user['id'] ?></h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
        <th>ID</th>
        <td><?php echo $user['id'] ?></td>
    </tr>
    <tr>
        <th>username</th>
        <td><?php echo $user['username'] ?></td>
    </tr>
    <tr>
        <th>first_name</th>
        <td><?php echo $user['first_name'] ?></td>
    </tr>
    <tr>
        <th>last_name</th>
        <td><?php echo $user['last_name'] ?></td>
    </tr>
    <tr>
        <th>phone</th>
        <td><?php echo $user['phone'] ?></td>
    </tr>
    <tr>
        <th>address</th>
        <td><?php echo $user['address'] ?></td>
    </tr>
    <tr>
        <th>email</th>
        <td><?php echo $user['email'] ?></td>
    </tr>
    <tr>
        <th>avatar</th>
        <td>
            <?php if (!empty($user['avatar'])): ?>
                <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>jobs</th>
        <td><?php echo $user['jobs'] ?></td>
    </tr>
    <tr>
        <th>last_login</th>
        <td><?php echo !empty($user['last_login']) ? date('d-m-Y H:i:s', strtotime($user['last_login'])) : '' ?></td>
    </tr>
    <tr>
        <th>status</th>
        <td><?php echo Helper::getStatusText($user['status']); ?></td>
    </tr>
    <tr>
        <th>created_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
    </tr>
    <tr>
        <th>updated_at</th>
        <td><?php echo date('d-m-Y H:i:s', strtotime($user['updated_at'])) ?></td>
    </tr>
    <tr><th>Quyền hạn</th>
        <td><?php
                $role = 'Người dùng';
                if ($user['level'] == 1) $role = 'Quản trị viên';
                else if ($user['level'] == 2) $role = 'Biên tập viên';
                else if ($user['level'] == 3) $role = 'Tác giả';
                echo $role; ?></td>
    </tr>
                  </thead>
                </table>
                <a class="btn btn-lg btn-primary" href="index.php?controller=user&action=index">Back</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <?php } else echo '<h3>Bạn không có quyền truy cập vào đây</h3>'; ?>