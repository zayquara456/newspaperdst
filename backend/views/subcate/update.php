<?php if (empty($subcategory)): ?>
    <h2>Không tồn tại danh mục con này</h2>
<?php else: ?>
    <h2>Chỉnh sửa danh mục #<?php echo $subcategory['SubCategoryId'] ?></h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
        <label>Chọn danh mục cha</label>
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
            <label>Tên danh mục</label>
            <input type="text" name="SubCatDescription"
                   value="<?php echo isset($_POST['SubCatDescription']) ? $_POST['SubCatDescription'] : $subcategory['SubCatDescription']; ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tên rút gọn</label>
            <input type="text" name="Subcategory"
                   value="<?php echo isset($_POST['Subcategory']) ? $_POST['Subcategory'] : $subcategory['Subcategory']; ?>"
                   class="form-control"/>
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
                        break;
                }
            }
            ?>
            <label>Trạng thái</label>
            <select name="Is_Active" class="form-control">
                <option value="0" <?php echo $selected_disabled ?> >Disabled</option>
                <option value="1" <?php echo $selected_active ?> >Active</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
        <a href="index.php?controller=subcate&action=index">Quay lại</a>
    </form>
<?php endif; ?>