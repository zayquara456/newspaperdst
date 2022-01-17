<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tìm kiếm danh mục</h1>
      </div>
    </div>   
<form action="" method="get">
    <input type="hidden" name="controller" value="category"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label>Nhập tên danh mục</label>
        <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=category" class="btn btn-lg btn-secondary">Xóa filter</a>
    </div>
</form>
<a href="index.php?controller=category&action=create" class="btn btn-lg btn-primary">
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
                <h3 style="font-size:18px;" class="card-title">Danh sách danh mục chính</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Ngày ra mắt danh mục</th>
                    <th>Ngày chỉnh sửa danh mục</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php if (!empty($categories)): ?>
    <?php foreach ($categories as $category): ?>
                  <tr>
                    <th><?php echo $category['id']; ?></th>
                    <td><?php echo $category['Description']; ?></td>
                    <td><?php echo date('d-m-Y H:i:s', strtotime($category['PostingDate'])); ?></td>
                    <td><?php
                if (!empty($category['UpdationDate'])) {
                  echo date('d-m-Y H:i:s', strtotime($category['UpdationDate']));
                }
                ?></td>
                    <td> <?php
                $status_text = 'Active';
                if ($category['Is_Active'] == 0) {
                  $status_text = 'Disabled';
                }
                echo $status_text;
                ?></td>
                 <td>
                  <a href="index.php?controller=category&action=detail&id=<?php echo $category['id'] ?>"
                     title="Chi tiết">
                      <i class="fa fa-eye"></i>
                  </a>
                  <a href="index.php?controller=category&action=update&id=<?php echo $category['id'] ?>" title="Sửa">
                      <i class="fa fa-pencil-alt"></i>
                  </a>
                  <a href="index.php?controller=category&action=delete&id=<?php echo $category['id'] ?>" title="Xóa"
                     onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục <?php echo $category['id'] ?> ')">
                      <i class="fa fa-trash"></i>
                  </a>
              </td>
                  </tr>
                   <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Ngày ra mắt danh mục</th>
                    <th>Ngày chỉnh sửa danh mục</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                    <tr>
          <td colspan="7"><?php echo $pages; ?></td>
      </tr>
                  </tfoot>

                   <?php else: ?>
                    <tr>
          <td colspan="7">Không có bản ghi nào</td>
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