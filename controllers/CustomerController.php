<?php
require_once 'models/User.php';
class CustomerController
{
    public $content;
    //chứa nội dung lỗi validate
    public $error;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {
        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require_once $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }

    public function login() {
        //nếu user đã đăng nhập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
        if (isset($_SESSION['username'])) {
            header('Location: index.php');
            exit();
        }
        if (isset($_POST['login'])) {
            global $username;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->error = "";
            if (empty($username)) {
                $this->error = '<script>alert("Username không được để trống");</script>';
            }
            if(empty($password)){
                $this->error .= '<script>alert("Password không được để trống");</script>';
            }
            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUserByUsernameAndPassword($username, md5($password));
                if (empty($user)) {
                    $this->error = '<script>alert("Sai username hoặc password");</script>';
                } else {
                    // $_SESSION['success'] = 'Đăng nhập thành công';
                    //tạo session user để xác định user nào đang login
                    if(isset($_POST['rememberLogin'])){
                        setcookie('is_login', true, time()+3600);
                        setcookie('username', $username, time()+3600);
                    }
                    $_SESSION['username'] = $user;
                    header("Location: index.php");
                    exit();
                }
            }
        }
        $this->content = $this->render('views/customers/login.php');
        require_once 'views/layouts/main_login.php';
    }

    public function logout(){
        global $username;
        if(isset($_SESSION['username'])){
            unset($_SESSION['username']);
        }
        if(isset($_COOKIE['is_login'])){
            setcookie('is_login', false, 0);
            setcookie('username', $username, 0);
        }
        header("Location: index.php");
        exit();
        // $this->content = $this->render('views/customers/login.php');
        // require_once 'views/layouts/main_login.php';
    }

    /**
     * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
     */
    public function register() {
        if (isset($_POST['register'])) {
            $user_model = new User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $user = $user_model->getUserByUsername($username);
            //check validate
            if (empty($username) || empty($password) || empty($password_confirm)) {
                $this->error = '<script>alert("Không được để trống các trường");</script>';
            } else if ($password != $password_confirm) {
                $this->error = '<script>alert("Password nhập lại chưa đúng");</script>';
            } else if (!empty($user)) {
                $this->error = '<script>alert("Username này đã tồn tại");</script>';
            }
            //xử lý lưu dữ liệu khi không có lỗi
            if (empty($this->error)) {

                $user_model->username = $username;
                //chú ý password khi lưu vào bảng users sẽ được mã hóa md5 trước khi lưu
                //do đang sử dụng cơ chế mã hóa này cho quy trình login
                $user_model->password = md5($password);
                $user_model->status = 1;
                $is_insert = $user_model->insertRegister();
                if ($is_insert) {
                    $_SESSION['success'] = '<script>alert("Đăng ký thành công");</script>';
                } else {
                    $_SESSION['error'] = '<script>alert("Đăng ký thất bại");</script>';
                }
                header('Location: login.html');
                exit();
            }
        }

        $this->content = $this->render('views/customers/register.php');
        require_once 'views/layouts/main_login.php';
    }
}
