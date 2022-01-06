<h2>Thêm mới bài viết</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="categoryid">Chọn danh mục</label>
        <select name="categoryid" onchange="updatesubcate();" class="form-control" id="categoryid">
            <?php foreach ($categories as $category):
                $selected = '';
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
    <div id="subcategory"></div>
    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
               class="form-control" id="title"/>
    </div>
     <div class="form-group">
        <label for="summary">Mô tả ngắn</label>
        <input type="text" name="summary" value="<?php echo isset($_POST['summary']) ? $_POST['summary'] : '' ?>"
               class="form-control" id="summary"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh minh họa bài viết</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
    </div>
    <div class="form-group">
        <label for="description">Chi tiết bài viết</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="seo-title">Seo title</label>
        <input type="text" name="seo_title" value="<?php echo isset($_POST['seo_title']) ? $_POST['seo_title'] : '' ?>"
               class="form-control" id="seo-title"/>
    </div>
    <div class="form-group">
        <label for="seo-description">Seo description</label>
        <input type="text" name="seo_description" value="<?php echo isset($_POST['seo_description']) ? $_POST['seo_description'] : '' ?>"
               class="form-control" id="seo-description"/>
    </div>

    <div class="form-group">
        <label for="seo-keywords">Seo keywords</label>
        <input type="text" name="seo_keywords" value="<?php echo isset($_POST['seo_keywords']) ? $_POST['seo_keywords'] : '' ?>"
               class="form-control" id="seo-keywords"/>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <?php
            $selected_active = '';
            $selected_disabled = '';
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
            <option value="1" <?php echo $selected_active ?>>Active</option>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
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