<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Pagination.php';
require_once 'models/Category.php';

class NewsController extends Controller {
  public function index() {
    $news_model = new News();
    $news = $news_model->getAll();
    $this->content = $this->render('views/news/index.php', [
        'news' => $news,
    ]);
    require_once 'views/layouts/main.php';
  }
  
  public function detail(){
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $news_model = new News();
    $news = $news_model->getNewsById($id);
    $tinmoinhat = $news_model->getAll();
    $this->content = $this->render('views/news/detail.php', [
      'news' => $news,
      'tinmoinhat' => $tinmoinhat,
    ]);
    require_once 'views/layouts/main.php';
  }
  public function news24h(){
    $category_model = new Category();
    $news_model = new News();
    $categories = $category_model->getAll();
    $count_total = $news_model->countTotal();
    $arr_params = [
        'total' => $count_total, //tổng số sản phẩm
        'limit' => 6, // giới hạn bản ghi mỗi trang
        'query_string' => 'page',
        'controller' => 'tin-tuc-24h',
        'full_mode' => false,
        // 'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1,
    ];
    $news = $news_model->getNewsPagination($arr_params);
    $pagination = new Pagination($arr_params);
    $pages = $pagination->getPagination();
    $this->content = $this->render('views/news/news.php', [
        'news' => $news,
        'pages' => $pages,
        'categories' => $categories,

    ]);
    require_once 'views/layouts/main.php';
  }
}