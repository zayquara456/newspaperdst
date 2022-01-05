<?php
require_once 'controllers/Controller.php';
require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController extends Controller {
  public function index() {
    $news_model = new News();
    $category_model = new Category();
    $news = $news_model->getNewsNearest();
    $categories = $category_model->getAll();
    $tinmoinhat = $news_model->getAll();
    $foursubcate = $category_model->get4Cate("3,4,6,8");
    $this->content = $this->render('views/homes/index.php', [
      'news' => $news,
      'tinmoinhat' => $tinmoinhat,
      'categories' => $categories,
      'foursubcate' => $foursubcate,
    ]);
    require_once 'views/layouts/main.php';
  }
}