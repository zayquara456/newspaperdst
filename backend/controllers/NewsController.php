<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';

class NewsController extends Controller
{
  public function index()
  {
    $news_model = new News();

    //lấy tổng số bản ghi đang có trong bảng products
    $count_total = $news_model->countTotal();
    //        xử lý phân trang
    $query_additional = '';
    if (isset($_GET['title'])) {
      $query_additional .= '&title=' . $_GET['title'];
    }
    if (isset($_GET['categoryid'])) {
      $query_additional .= '&categoryid=' . $_GET['categoryid'];
    }
    $arr_params = [
        'total' => $count_total,
        'limit' => 10,
        'query_string' => 'page',
        'controller' => 'news',
        'action' => 'index',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $news = $news_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);

    $pages = $pagination->getPagination();

    //lấy danh sách category đang có trên hệ thống để phục vụ cho search
    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/news/index.php', [
        'news' => $news,
        'categories' => $categories,
        'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $categoryid = $_POST['categoryid'];
      $subcategoryid = (isset($_POST['subcategoryid'])) ? $_POST['subcategoryid'] : NULL;
      $status = $_POST['status'];
      $seo_title = $_POST['seo_title'];
      $seo_description = $_POST['seo_description'];
      $seo_keywords = $_POST['seo_keywords'];
      //xử lý validate
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024 ;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {
        $filename = '';
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/images';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filename = time() . '-news-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
        }
        //save dữ liệu vào bảng products
        $news_model = new News();
        $news_model->title = $title;
        $news_model->summary = $summary;
        $news_model->content= $content;
        $news_model->avatar = $filename;
        $news_model->categoryid = $categoryid;
        $news_model->subcategoryid = $subcategoryid;
        $news_model->status = $status;
        $news_model->seo_title = $seo_title;
        $news_model->seo_description = $seo_description;
        $news_model->seo_keywords = $seo_keywords;
        $news_model->created_at = date('Y-m-d H:i:s');
        $is_insert = $news_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm bài viết thành công';
        } else {
          $_SESSION['error'] = 'Thêm bài viết thất bại';
        }
        header('Location: index.php?controller=news');
        exit();
      }
    }

    //lấy danh sách category đang có trên hệ thống để phục vụ cho search
    $category_model = new Category();
    $categories = $category_model->getAll();
    $this->content = $this->render('views/news/create.php', [
        'categories' => $categories,
    ]);
    require_once 'views/layouts/main.php';
  }
  public function hiendanhmuc()
  {
    $category_model = new Category();
    $subcate = $category_model->getSubcateByID($subcateid = (isset($_GET['idcate'])) ? $_GET['idcate'] : 0);
    if ($subcateid != 0)
    {
      echo "<div class='form-group'>
        <label for='subcategoryid'>Chọn danh mục phụ</label>
        <select name='subcategoryid' class='form-control' id='subcategoryid'><option value='0' selected>Không danh mục phụ</option> ";
            foreach ($subcate as $category):
               echo "<option value=".$category['SubCategoryId']." >
                    ".$category['SubCatDescription']."</option>";
                endforeach;
                echo "</select></div>";
    }

  }
  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=news');
      exit();
    }

    $id = $_GET['id'];
    $news_model = new News();
    $new = $news_model->getById($id);

    $this->content = $this->render('views/news/detail.php', [
        'new' => $new
    ]);
    require_once 'views/layouts/main.php';
  }

  public function update()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=news');
      exit();
    }

    $id = $_GET['id'];
    $news_model = new News();
    $new = $news_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $categoryid = $_POST['categoryid'];
      $subcategoryid = (isset($_POST['subcategoryid'])) ? $_POST['subcategoryid'] : NULL;
      $status = $_POST['status'];
      $seo_title = $_POST['seo_title'];
      $seo_description = $_POST['seo_description'];
      $seo_keywords = $_POST['seo_keywords'];
      //xử lý validate
      if (empty($title)) {
        $this->error = 'Không được để trống title';
      } else if ($_FILES['avatar']['error'] == 0) {
        //validate khi có file upload lên thì bắt buộc phải là ảnh và dung lượng không quá 2 Mb
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

        $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $arr_extension)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb > 2) {
          $this->error = 'File upload không được quá 2MB';
        }
      }

      //nếu ko có lỗi thì tiến hành save dữ liệu
      if (empty($this->error)) {
        $filename = $new['avatar'];
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/images';
          //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
          @unlink($dir_uploads . '/' . $filename);
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filename = time() . '-news-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
        }
        //save dữ liệu vào bảng products
        $news_model->title = $title;
        $news_model->summary = $summary;
        $news_model->content = $content;
        $news_model->categoryid = $categoryid;
        $news_model->subcategoryid = $subcategoryid;
        $news_model->status = $status;
        $news_model->avatar = $filename;
        $news_model->seo_title = $seo_title;
        $news_model->seo_description = $seo_description;
        $news_model->seo_keywords = $seo_keywords;
        $news_model->updated_at = date('Y-m-d H:i:s');

        $is_update = $news_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=news');
        exit();
      }
    }

    //lấy danh sách category đang có trên hệ thống để phục vụ cho search
    $category_model = new Category();
    $categories = $category_model->getAll();
    $subcate = $category_model->getSubcateByID($new['categoryid']);
    $this->content = $this->render('views/news/update.php', [
        'categories' => $categories,
        'new' => $new,
        'subcate' => $subcate,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=news');
      exit();
    }

    $id = $_GET['id'];
    $news_model = new News();
    $is_delete = $news_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=news');
    exit();
  }
}