<?php if (empty($category)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $category['id'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="Description"
                   value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : $category['Description']; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tên rút gọn</label>
            <input type="text" name="CategoryName"
                   value="<?php echo isset($_POST['CategoryName']) ? $_POST['CategoryName'] : $category['CategoryName']; ?>"
                   class="form-control"/>
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
                        break;
                }
            }
            ?>
            <label>Trạng thái</label>
            <select name="Is_Active" class="form-control">
                <option value="0" <?php echo $selected_active ?> >Disabled</option>
                <option value="1" <?php echo $selected_disabled ?> >Active</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
        <a href="index.php?controller=category&action=index">Quay lại</a>
    </form>
<?php endif; ?>