<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    //Phương thức thêm sản phẩm vào giỏ hàng
    public function add()
    {
        $product_id = $_GET['product_id'];
        // Gọi model để lấy ra thông tin sản phẩm theo id trên
        $product_model = new Product();
        $product = $product_model->getById($product_id);

        // Tạo biến để lưu các thông tin sản phẩm theo cấu trúc
        //của giỏ hàng ban đầu: tên sp, giá, avatar, quantity
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            //mặc định số lượng ban đầu khi thêm vào giỏ = 1
            'quantity' => 1
        ];
        // Khi click thêm vào giỏ, sẽ có 2 trường hợp xảy ra:
        // Nếu giỏ hàng chưa từng tồn tại trước đó, thì cần khởi tạo
        //giỏ hàng và thêm sản phẩm mới vào giỏ
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart;
        }
        else {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart;
            }
        }
    }

    //Phương thức liệt kê sản phẩm trong giỏ - Giỏ hàng của bạn
    public function index()
    {
        if (isset($_POST['updateCart'])) {
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }
            $_SESSION['success'] = 'Cập nhật giỏ thành công';
        }

        //Lấy  nội dung view views/carts/index.php
        $this->content = $this->render('views/carts/index.php');
        // Gọi layout để hiển thị nội dung view trên
        require_once 'views/layouts/main.php';

    }

    //Phương thức xóa sản phẩm khỏi Giỏ
    public function delete() {
        $product_id = $_GET['id'];
        //Xử lý xóa
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['success'] = "Xóa sản phẩm có id = $product_id thành công";
        header("Location: gio-hang-cua-ban.html");
        exit();
    }

    public function deleteAll(){
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        header("Location: gio-hang-cua-ban.html");
        exit();
    }
}