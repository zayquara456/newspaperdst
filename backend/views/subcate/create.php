<div class="card card-primary">
  <div class="card-header">
    <h3 style="font-size:18px;" class="card-title">Thêm mới danh mục con</h3>
  </div>
  <form method="post" action="">
    <div class="card-body">
        <div class="form-group">
            <label>Chọn danh mục cha</label>
        <select name="categoryid"  class="form-control" id="categoryid">
            <?php foreach ($maincate as $category):
                $selected = '';
                if (isset($_POST['categoryid']) && $category['id'] == $_POST['categoryid']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $category['Description'] ?></option>
            <?php endforeach; ?>
        </select>
        </div>
      <div class="form-group">
        <label name="SubCatDescription">Tên danh mục con</label>
        <input type="text" value="<?php echo isset($_POST['SubCatDescription']) ? $_POST['SubCatDescription'] : ''; ?>" class="form-control" id="SubCatDescription" name="SubCatDescription" placeholder="Tên danh mục">
      </div>
        <div class="form-group">
          <?php
      $selected_active = '';
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
                  <button type="reset" class="btn btn-secondary" name="submit">Hoàn tác</button>
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=subcate&action=index">Quay lại</a>
                </div>
              </form>
            </div>