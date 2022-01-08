<?php
require_once 'controllers/Controller.php';
require_once 'models/NewsCate.php';
require_once 'models/Pagination.php';

class DanhmucController extends Controller {
  public function index() {
	  $idofcate = $_GET['name'];
    $news_model = new NewsCate(); 
    //lấy ra tên của danh mục
    $nameofcate = $news_model->getByNameCate($idofcate);
    //số lương sản phẩm theo danh mục
    $count_total = $news_model->countTotal($idofcate);
	  $arr_params = [
        'total' => $count_total, //tổng số sản phẩm
        'limit' => 6, // giới hạn bản ghi mỗi trang
        'query_string' => 'page',
        'controller' => 'danhmuc',
        'full_mode' => false,
        // 'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
	  $newsofcate = $news_model->getAllPagination($arr_params, $idofcate);
    $pagination = new Pagination($arr_params);
    $pages = $pagination->getPagination();
    $this->content = $this->render('views/danhmuc/page.php', [
      'newsofcate' => $newsofcate,
      'nameofcate' => $nameofcate,
      'pages' => $pages
    ]);
    require_once 'views/layouts/main.php';
  }
}