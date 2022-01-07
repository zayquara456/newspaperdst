<h1>Chi tiết danh mục</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $category['id']; ?></td>
    </tr>
    <tr>
        <th>Tên ngắn ngọn</th>
        <td><?php echo $category['CategoryName']; ?></td>
    </tr>
    <tr>
        <th>Tên danh mục</th>
        <td><?php echo $category['Description']; ?></td>
    </tr>
    <tr>
        <th>Ngày tạo</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['PostingDate'])); ?>
        </td>
    </tr>
    <tr>
        <th>Ngày sửa danh mục</th>
        <td>
            <?php echo date('d-m-Y H:i:s', strtotime($category['UpdationDate'])); ?>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php
            $status_text = 'Active';
            if ($category['Is_Active'] == 0) {
                $status_text = 'Disabled';
            }
            echo $status_text;
            ?>
        </td>
    </tr>
 

</table>
<a class="btn btn-primary" href="index.php?controller=category">Back</a>

