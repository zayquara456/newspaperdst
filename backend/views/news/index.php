<?php
require_once 'helpers/Helper.php';
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Danh sách các bài viết</h1>
      </div>
    </div>   
<form action="" method="get">
    <input type="hidden" name="controller" value="news"/>
    <input type="hidden" name="action" value="index"/>
    <div class="form-group">
        <label for="title">Tìm kiếm theo tiêu đề</label>
        <input type="text" name="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>"
               id="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="title">Chọn danh mục</label>
        <select name="categoryid" class="form-control">
            <?php foreach ($categories as $category):
                $selected = '';
                if (isset($_GET['categoryid']) && $category['id'] == $_GET['categoryid']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $category['Description'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-success"/>
        <a href="index.php?controller=news" class="btn btn-lg btn-secondary">Xóa từ khóa tìm kiếm</a>
    </div>
</form>
<a href="index.php?controller=news&action=create" class="btn btn-lg btn-primary">
    <i class="fa fa-plus"></i> Thêm bài viết
</a>
  </div>
</section>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Danh sách bài viết</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Avatar</th>
                        <th>Danh mục chính</th>
                        <th>Danh mục con</th>
                        <th>Trạng thái</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($news)): ?>
        <?php foreach ($news as $new): ?>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <th><?php echo $new['id'] ?></th>
                        <td><?php echo $new['title'] ?></td>
                        <td>
                            <?php if (!empty($new['avatar'])): ?>
                                <img height="80" src="assets/images/<?php echo $new['avatar'] ?>"/>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $new['category_name'] ?></td>
                        <td><?php echo $new['subcate_name'] ?></td>
                        <td><?php echo Helper::getStatusText($new['status']) ?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
                        <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
                        <td>
                            <?php
                            $url_detail = "index.php?controller=news&action=detail&id=" . $new['id'];
                            $url_update = "index.php?controller=news&action=update&id=" . $new['id'];
                            $url_delete = "index.php?controller=news&action=delete&id=" . $new['id'];
                            ?>
                            <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                            <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                            <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn có chắc xóa bài viết số <?php echo $new['id'] ?>?')"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr class="expandable-body">
                      <td colspan="9">
                        <p><B>Tóm tắt bài viết: </B>
                         <?php echo $new['summary'] ?>
                        </p>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="9">Không có dữ liệu</td>
                    </tr>
                  </tbody>
                  <?php endif; ?>
                </table>
                 <?php echo $pages; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>