<?php if($_SESSION['user']['level'] == 1) { ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Danh sách người dùng</h1>
      </div>
    </div>   
<form action="" method="get">
    <input type="hidden" name="controller" value="user"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label for="username">Tìm kiếm theo tên</label>
        <input type="text" name="username" value="<?php echo isset($_GET['username']) ? $_GET['username'] : '' ?>"
               id="username" class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=user" class="btn btn-lg btn-secondary">Xóa từ khóa tìm kiếm</a>
    </div>
</form>
<a href="index.php?controller=user&action=create" class="btn btn-lg btn-primary">
    <i class="fa fa-plus"></i> Thêm mới danh mục
</a>
  </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
<div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Danh sách người dùng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>avatar</th>
                    <th>jobs</th>
                    <th>Role</th>
                    <th>created_at</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
                  <tr>
                <th><?php echo $user['id'] ?></th>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td>
                    <?php if (!empty($user['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $user['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo $user['jobs'] ?></td>
                <td><?php
                $role = 'Người dùng';
                if ($user['level'] == 1) $role = 'Quản trị viên';
                else if ($user['level'] == 2) $role = 'Biên tập viên';
                else if ($user['level'] == 3) $role = 'Tác giả';
                echo $role; ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=user&action=detail&id=" . $user['id'];
                    $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
                    $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
                   <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>avatar</th>
                    <th>jobs</th>
                    <th>Role</th>
                    <th>created_at</th>
                    <th></th>
                  </tr>
                    <tr>
          <td colspan="9"><?php echo $pages; ?></td>
                     </tr>
                  </tfoot>

                   <?php else: ?>
                    <tr>
          <td colspan="9">Không có bản ghi nào</td>
                    </tr>
                  <?php endif; ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } else echo '<h3>Bạn không có quyền truy cập vào đây</h3>'; ?>