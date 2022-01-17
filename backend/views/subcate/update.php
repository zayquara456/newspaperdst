<?php if (empty($subcategory)): ?>
    <h2>Không tồn tại danh mục con này</h2>
<?php else: ?>
<div class="card card-primary">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Chỉnh sửa danh mục con #<?php echo $subcategory['SubCategoryId']?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                    <div class="form-group">
                        <label for="categoryid">Chọn danh mục cha</label>
                        <select name="categoryid"  class="form-control" id="categoryid">
                            <?php foreach ($maincate as $category):
                                $selected = '';
                                if (isset($subcategory['CategoryId']) && $category['id'] == $subcategory['CategoryId']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                    <?php echo $category['Description'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="SubCatDescription">Tên danh mục</label>
                    <input type="text" class="form-control" id="SubCatDescription" value="<?php echo isset($_POST['SubCatDescription']) ? $_POST['SubCatDescription'] : $subcategory['SubCatDescription']; ?>" name="SubCatDescription" placeholder="Tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="Subcategory">Tên rút gọn</label>
                    <input type="text" class="form-control" id="Subcategory" name="Subcategory" placeholder="Tên rút gọn" value="<?php echo isset($_POST['Subcategory']) ? $_POST['Subcategory'] : $subcategory['Subcategory']; ?>">
                  </div>
                  <div class="form-group">
                  <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($subcategory['Is_Active'])) {
                switch ($subcategory['Is_Active']) {
                    case 0:
                      $selected_disabled = 'selected';
                        break;
                    case 1:
                      $selected_active = 'selected';
                        break; }  } ?>
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
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=subcate&action=index">Quay lại</a>
                </div>
              </form>
            </div>
            <?php endif; ?>