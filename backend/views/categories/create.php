<div class="card card-primary">
  <div class="card-header">
    <h3 style="font-size:18px;" class="card-title">Thêm mới danh mục chính</h3>
  </div>
  <form method="post" action="">
    <div class="card-body">
      <div class="form-group">
        <label for="Description">Tên danh mục</label>
        <input type="text" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : ''; ?>" class="form-control" id="Description" name="Description" placeholder="Tên danh mục">
      </div>
        <div class="form-group">
          <?php $selected_active = '';
      $selected_disabled = '';
      if (isset($_POST['Is_Active'])) {
        switch ($_POST['Is_Active']) {
          case 0:
            $selected_disabled = 'selected';
            break;
          case 1:
            $selected_active = 'selected';
            break; } } ?>
        <label>Trạng thái</label>
        <select name="Is_Active" class="form-control">
            <option value="0" <?php echo $selected_disabled ?> >Active</option>
            <option value="1" <?php echo $selected_active ?> >Disabled</option>
        </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
                  <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=category&action=index">Quay lại</a>
                </div>
              </form>
            </div>