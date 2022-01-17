<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Chi tiết danh mục con #<?php echo $category['SubCategoryId']; ?></h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                   <tr>
        <th>ID</th>
        <td><?php echo $category['SubCategoryId']; ?></td>
    </tr>
    <tr>
        <th>Tên danh mục cha</th>
        <td><?php echo $category['danhmuccha']; ?></td>
    </tr>
    <tr>
        <th>Tên danh mục</th>
        <td><?php echo $category['SubCatDescription']; ?></td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['PostingDate'])); ?>
        </td>
    </tr>
    <tr>
        <th>Ngày sửa danh mục</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['UpdationDate'])); ?>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($category['Is_Active'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
                  </thead>
                </table>
                <a class="btn btn-lg btn-primary" href="index.php?controller=category">Back</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>