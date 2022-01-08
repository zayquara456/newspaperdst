<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';

class CategoryController extends Controller
{
  public function index()
  {
    //hiển thị danh sách category
    $category_model = new Category();
    //do có sử dụng phân trang nên sẽ khai báo mảng các params
    $params = [
      'limit' => 10, //giới hạn 5 bản ghi 1 trang
      'query_string' => 'page',
      'controller' => 'category',
      'action' => 'index',
      'full_mode' => FALSE,
    ];
//    mặc đinh page hiện tại là 1
    $page = 1;
    //nếu có truyền tham số page lên trình duyêt - tương đương đang ở tại trang nào, thì gán giá trị đó cho biến $page
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    //xử lý form tìm kiếm
    if (isset($_GET['name'])) {
      $params['name'] = $_GET['name'];
    }

    //lấy tổng số bản ghi dựa theo các điều kiện có được từ mảng params truyền vào
    $count_total = $category_model->countTotal();
    $params['total'] = $count_total;

    //gán biến name cho mảng params với key là name
    $params['page'] = $page;
    $pagination = new Pagination($params);
    //lấy ra html phân trang
    $pages = $pagination->getPagination();

    //lấy danh sách category sử dụng phân trang
    $categories = $category_model->getAllPagination($params);

    $this->content = $this->render('views/categories/index.php', [
      //truyền biến $categories ra vew
      'categories' => $categories,
      //truyền biến phân trang ra view
      'pages' => $pages,
    ]);

    //gọi layout để nhúng thuộc tính $this->content
    require_once 'views/layouts/main.php';
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $Description = $_POST['Description'];
      $Is_Active = $_POST['Is_Active'];
      //check validate
      if (empty($Description)) {
        $this->error = 'Cần nhập tên';
      } 

      if (empty($this->error)) {
        //lưu vào csdl
        //gọi model để thực  hiện lưu
        $category_model = new Category();
        //gán các giá trị từ form cho các thuộc tính của category
        $category_model->CategoryName = $category_model->vn_to_str($Description);
        $category_model->Description = $Description;
        $category_model->Is_Active = $Is_Active;
        $category_model->PostingDate = date('Y-m-d H:i:s');
        //gọi phương thức insert
        $is_insert = $category_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=category&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/categories/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  }

  public function update()
  {
    //về cơ bản update sẽ khá giống create
    //lấy category theo id bắt đươc
    //check validate nếu id không tồn tại thì báo lỗi
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID category không hợp lệ';
      header('Location: index.php?controller=category&action=index');
      exit();
    }

    $id = $_GET['id'];
    $category_model = new Category();
    $category = $category_model->getCategoryById($id);
    //submit form
    if (isset($_POST['submit'])) {
      $CategoryName = $_POST['CategoryName'];
      $Description = $_POST['Description'];
      $Is_Active = $_POST['Is_Active'];
      //check validate
      if (empty($CategoryName)) {
        $this->error = 'Cần nhập tên';
      } 

      if (empty($this->error)) {
        //lưu vào csdl
        //gọi model để thực  hiện lưu
        $category_model = new Category();
        //gán các giá trị từ form cho các thuộc tính của category
        $category_model->CategoryName = $CategoryName;
        $category_model->Description = $Description;
        $category_model->Is_Active = $Is_Active;
        $category_model->UpdationDate = date('Y-m-d H:i:s');
        //gọi phương thức update theo id
        $is_update = $category_model->update($id);
        if ($is_update) {
          $_SESSION['success'] = 'Update thành công';
        } else {
          $_SESSION['error'] = 'Update thất bại';
        }
        header('Location: index.php?controller=category&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/categories/update.php', ['category' => $category]);
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  }

  public function delete()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=category&action=index');
      exit();
    }
    $id = $_GET['id'];
    $category_model = new Category();
    $is_delete = $category_model->delete($id);
    if ($is_delete) {
      $_SESSION['success'] = 'Xóa thành công';
    } else {
      $_SESSION['error'] = 'Xóa thất bại';
    }
    header('Location: index.php?controller=category&action=index');
    exit();
  }

  public function detail()
  {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
      $_SESSION['error'] = 'ID không hợp lệ';
      header('Location: index.php?controller=category&action=index');
      exit();
    }
    $id = $_GET['id'];
    $category_model = new Category();
    $category = $category_model->getCategoryById($id);
    //lấy nội dung view create.php
    $this->content = $this->render('views/categories/detail.php', [
      'category' => $category
    ]);
    //gọi layout để nhúng nội dung view detail vừa lấy đc
    require_once 'views/layouts/main.php';

  }
}
