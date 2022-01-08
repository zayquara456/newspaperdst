<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
// Khóa bảo vệ backend cơ bản
/* if(isset($_GET['key']) && $_GET['key'] == "DST"){
  setcookie("key", "dstgroup", time() + 86400, "/");
}
if(isset($_COOKIE['key'])){
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'category';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
}
else {
  $controller = NULL;
$action = NULL;
}*/

$controller = ucfirst($controller); //Book
$controller .= "Controller"; //BookController
//đường dẫn của file BookController.php đang nằm tại vị trí:
//controllers/BookController.php
$path_controller = "controllers/$controller.php";
//controller/BookController.php

//kiểm tra nếu đường dẫn ko tồn tại, thì báo trang ko tồn tại
if (file_exists($path_controller) == false) {
  die('Trang bạn tìm không tồn tại');
}

require_once "$path_controller";

//khởi tạo đối tượng sau khi nhúng file
$object = new $controller(); //$object = new BookController()

if (method_exists($object, $action) == false) {
  die("<h2>Empty $action class $controller (Từ chối truy cập)</h2>");
}
//index.php?controller=book&action=create
$object->$action();
?>