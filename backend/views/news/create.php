<div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Thêm bài viết</h3>
              </div>
               <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
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
                  </thead>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Nội dung bài viết</h3>
              </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                     <div class="form-group">
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
    </div>
                  </thead>
                          <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
                  <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
                  <a class="btn btn-lg btn-secondary" href="index.php?controller=news&action=index">Quay lại</a>
                </div>
                </table>
              </div>
            </div>
          </div>
              </form>
        </div>
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