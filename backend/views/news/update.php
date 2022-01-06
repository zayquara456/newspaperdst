<h2>Cập nhật bài viết</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoryid">Chọn danh mục</label>
        <select name="categoryid" onchange="updatesubcate();" class="form-control" id="categoryid">
          <?php
          foreach ($categories as $category):
            $selected = '';
            if ($category['id'] == $new['categoryid']) {
              $selected = 'selected';
            }
            if (isset($_POST['categoryid']) && $category['id'] == $_POST['categoryid']) {
              $selected = 'selected';
            }
            ?>
              <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                <?php echo $category['Description'] ?>
              </option>
          <?php endforeach; ?>
        </select>
    </div>
    <div id="subcategory">
        <div class="form-group">
        <label for="subcategoryid">Danh mục phụ</label>
        <select name="subcategoryid" class="form-control" class="form-control" id="subcategoryid">
            <option value='0' selected>Không danh mục phụ</option>
          <?php
          foreach ($subcate as $category):
            $selected = '';
            if ($category['SubCategoryId'] == $new['subcategoryid']) {
              $selected = 'selected';
            }
            if (isset($_POST['subcategoryid']) && $category['id'] == $_POST['subcategoryid']) {
              $selected = 'selected';
            }
            ?>
              <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                <?php echo $category['SubCatDescription'] ?>
              </option>
          <?php endforeach; ?>
        </select>
        </div>
    </div>
    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" name="title"
               value="<?php echo isset($_POST['title']) ? $_POST['title'] : $new['title'] ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn</label>
        <input type="text" name="summary"
               value="<?php echo isset($_POST['summary']) ? $_POST['summary'] : $new['summary'] ?>"
               class="form-control" id="summary"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh minh họa bài viết</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
      <?php if (!empty($new['avatar'])): ?>
          <img height="80" src="assets/images/<?php echo $new['avatar'] ?>"/>
      <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="description">Chi tiết bài viết</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : $new['content'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="seo-title">Seo title</label>
        <input type="text" name="seo_title" value="<?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : $new['seo_title'] ?>"
               class="form-control" id="seo-title"/>
    </div>
    <div class="form-group">
        <label for="seo-description">Seo description</label>
        <input type="text" name="seo_description" value="<?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : $new['seo_description'] ?>"
               class="form-control" id="seo-description"/>
    </div>
    <div class="form-group">
        <label for="seo-keywords">Seo keywords</label>
        <input type="text" name="seo_keywords" value="<?php echo isset($_POST['seo_keywords']) ? $_POST['seo_keywords'] : $new['seo_keywords'] ?>"
               class="form-control" id="seo-keywords"/>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
          <?php
          $selected_disabled = '';
          $selected_active = '';
          if ($new['status'] == 0) {
            $selected_disabled = 'selected';
          } else {
            $selected_active = 'selected';
          }
          if (isset($_POST['status'])) {
            switch ($_POST['status']) {
              case 0:
                $selected_disabled = 'selected';
                break;
              case 1:
                $selected_active = 'selected';
                break;
            }
          }
          ?>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=news&action=index" class="btn btn-default">Back</a>
    </div>
</form>
<script type="text/javascript">
    function updatesubcate()
            {
                $.ajax({
                    url : "index.php?controller=news&action=hiendanhmuc",
                    type : "get",
                    dateType:"number",
                    data : { 
                         idcate : $('#categoryid').val()
                    },
                    success : function (result){
                       $('#subcategory').html(result);
                    }
                });
            } 
</script>