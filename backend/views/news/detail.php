<?php
require_once 'helpers/Helper.php';
 $slug = Helper::getSlug($new['title']);
 $items_link = "tt-$slug/" . $new['id'] . ".html";
?>
<style type="text/css">img {
    width: 100px; height: 100px;
}</style>
<table class="table table-bordered">
    <tr><th>Đường dẫn bài viết</th>
        <td><a href="/<?php echo $items_link; ?>">Click here</a></td></tr>
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
     <tr>
        <th>Nội dung</th>
        <td><?php echo $new['content']?></td>
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
</table>
<a href="index.php?controller=news&action=index" class="btn btn-default">Quay lại</a>