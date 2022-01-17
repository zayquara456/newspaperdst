<?php if (empty($category)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
<div class="card card-primary">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Chỉnh sửa danh mục #<?php echo $category['id'] ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Description">Tên danh mục</label>
                    <input type="text" class="form-control" id="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : $category['Description']; ?>" name="Description" placeholder="Tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="CategoryName">Tên rút gọn</label>
                    <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="Tên rút gọn" value="<?php echo isset($_POST['CategoryName']) ? $_POST['CategoryName'] : $category['CategoryName']; ?>">
                  </div>
                  <div class="form-group">
                   <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($category['Is_Active'])) {
                switch ($category['Is_Active']) {
                    case 0:
                      $selected_disabled = 'selected';
                        break;
                    case 1:
                      $selected_active = 'selected';
                        break;}} ?>
                         <label for="status">Trạng thái</label>
            <select name="Is_Active" id="status" class="form-control">
                <option value="0" <?php echo $selected_disabled ?> >Disabled</option>
                <option value="1" <?php echo $selected_active ?> >Active</option>
            </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                  <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=category&action=index">Quay lại</a>
                </div>
              </form>
            </div>
            <?php endif; ?>