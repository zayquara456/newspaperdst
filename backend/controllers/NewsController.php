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
      $subcategoryid = $_POST['subcategoryid'];
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
        $filename = '';
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/images';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filename = time() . '-product-' . $_FILES['avatar']['name'];
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
    $subcate = $category_model->getAllSubcate();

    $this->content = $this->render('views/news/create.php', [
        'categories' => $categories,
        'subcate' => $subcate,
    ]);
    require_once 'views/layouts/main.php';
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
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $product = $product_model->getById($id);
    //xử lý submit form
    if (isset($_POST['submit'])) {
      $category_id = $_POST['category_id'];
      $title = $_POST['title'];
      $price = $_POST['price'];
      $amount = $_POST['amount'];
      $summary = $_POST['summary'];
      $content = $_POST['content'];
      $seo_title = $_POST['seo_title'];
      $seo_description= $_POST['seo_description'];
      $seo_keywords = $_POST['seo_keywords'];
      $status = $_POST['status'];
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
        $filename = $product['avatar'];
        //xử lý upload file nếu có
        if ($_FILES['avatar']['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/images';
          //xóa file cũ, thêm @ vào trước hàm unlink để tránh báo lỗi khi xóa file ko tồn tại
          @unlink($dir_uploads . '/' . $filename);
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo tên file theo 1 chuỗi ngẫu nhiên để tránh upload file trùng lặp
          $filename = time() . '-product-' . $_FILES['avatar']['name'];
          move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
        }
        //save dữ liệu vào bảng products
        $product_model->category_id = $category_id;
        $product_model->title = $title;
        $product_model->avatar = $filename;
        $product_model->price = $price;
        $product_model->amount = $amount;
        $product_model->summary = $summary;
        $product_model->content = $content;
        $product_model->seo_title = $seo_title;
        $product_model->seo_description = $seo_description;
        $product_model->seo_keywords = $seo_keywords;
        $product_model->status = $status;
        $product_model->updated_at = date('Y-m-d H:i:s');

        $is_update = $product_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update dữ liệu thành công';
        } else {
          $_SESSION['error'] = 'Update dữ liệu thất bại';
        }
        header('Location: index.php?controller=product');
        exit();
      }
    }

    //lấy danh sách category đang có trên hệ thống để phục vụ cho search
    $category_model = new Category();
    $categories = $category_model->getAll();

    $this->content = $this->render('views/products/update.php', [
        'categories' => $categories,
        'product' => $product,
    ]);
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=product');
      exit();
    }

    $id = $_GET['id'];
    $product_model = new Product();
    $is_delete = $product_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa dữ liệu thành công';
    } else {
      $_SESSION['error'] = 'Xóa dữ liệu thất bại';
    }
    header('Location: index.php?controller=product');
    exit();
  }
}