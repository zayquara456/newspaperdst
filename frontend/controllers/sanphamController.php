<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class SanPhamController extends Controller {
  public function index() {
    $product_model = new Product();
	$danhmuc = $product_model->getCate();
	$productfill = $product_model->getProductInStore();

    $this->content = $this->render('views/homes/sanpham.php', [
	  'danhmuc' => $danhmuc,
	  'productfill' => $productfill
    ]);
    require_once 'views/layouts/main.php';
  }
}