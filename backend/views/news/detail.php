<?php
require_once 'helpers/Helper.php';
 $slug = Helper::getSlug($new['title']);
 $items_link = "tt-$slug/" . $new['id'] . ".html";
?>
<style type="text/css">img {
    width: 100px; height: 100px;
}</style>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="font-size:18px;" class="card-title">Bài viết: <?php echo $new['title'] ?></h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr><th>Đường dẫn bài viết</th>
                        <td><a class="btn btn-lg btn-primary" href="/<?php echo $items_link; ?>">Di chuyển đến bài viết</a></td></tr>
                    <tr>
                        <th>ID</th>
                        <td><?php echo $new['id']?></td>
                    </tr>
                    <tr>
                        <th>Tiêu đề</th>
                        <td><?php echo $new['title']?></td>
                    </tr>
                    <tr>
                        <th>Tóm tắt</th>
                        <td><?php echo $new['summary']?></td>
                    </tr>
                     <tr data-widget="expandable-table" aria-expanded="false">
                        <th>Nội dung</th>
                        <td><span class="badge bg-danger">Nhấp vào để hiển thị</span></td> 
                    </tr>
                    <tr class="expandable-body">
                          <td colspan="2">
                            <p>
                             <?php echo $new['content']?>
                            </p>
                          </td>
                        </tr>
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <?php if (!empty($new['avatar'])): ?>
                                <img height="80" src="assets/images/<?php echo $new['avatar'] ?>"/>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Danh mục chính</th>
                        <td><?php echo $new['category_name']?></td>
                    </tr>
                     <tr>
                        <th>Danh mục phụ</th>
                        <td><?php echo $new['subcate_name']?></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td><?php echo Helper::getStatusText($new['status']) ?></td>
                    </tr>
                    <tr>
                        <th>Seo Title</th>
                        <td><?php echo $new['seo_title'] ?></td>
                    </tr>
                    <tr>
                        <th>Seo description</th>
                        <td><?php echo $new['seo_description'] ?></td>
                    </tr>
                    <tr>
                        <th>Seo keywords</th>
                        <td><?php echo $new['seo_keywords'] ?></td>
                    </tr>
                    
                    <tr>
                        <th>Created at</th>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($new['created_at'])) ?></td>
                    </tr>
                    <tr>
                        <th>Updated at</th>
                        <td><?php echo !empty($new['updated_at']) ? date('d-m-Y H:i:s', strtotime($new['updated_at'])) : '--' ?></td>
                    </tr>
                  </thead>
                </table>
                <a class="btn btn-lg btn-default" href="index.php?controller=news&action=index">Quay lại</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>