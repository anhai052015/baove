<?php

class ClientController
{
    public $user;
    public $products;
    public $admin;
    public $comment;

    function __construct()
    {
        $this->user = new User();
        $this->products = new Products();
        $this->admin = new Admin();
        $this->comment = new Comment();
    }

    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        if (isset($_GET['action']) && $_GET['action'] == 'category' && isset($_GET['id'])) {
            // Lọc sản phẩm theo ID danh mục
            $dataAll = $this->products->category($_GET['id']);
        } else {
            $dataAll = $this->products->getAll();
        }

        $view = 'client/home';
        require_once PATH_VIEW . 'main.php';
    }

    function login()
    {
        $message = "Hãy đăng nhập";
        $view = 'client/login';
        require_once PATH_VIEW . 'main.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $email = trim($_POST['email']);

            if (!preg_match("/^[a-zA-Z0-9._%+-]+@gmail\.com$/", $email)) {
                $_SESSION['msg'] = "Email phải là Gmail!";
                header('Location: ' . BASE_URL . '?action=register');
                exit;
            }

            $checkUser = $this->user->check($username, $password, $email);
            if (!empty($checkUser)) {
                $_SESSION['msg'] = "Tài khoản hoặc Email đã tồn tại!";
                header('Location: ' . BASE_URL . '?action=register');
                exit;
            }

            $hashedPass = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $hashedPass
            ];

            $row = $this->user->add($data);

            if ($row > 0) {
                $_SESSION['msg'] = "Đăng ký thành công, mời đăng nhập!";
                header('Location: ' . BASE_URL . '?action=login');
                exit;
            } else {
                $_SESSION['msg'] = "Đăng ký thất bại!";
                header('Location: ' . BASE_URL . '?action=register');
                exit;
            }
        }

        $message = "Hãy đăng ký";
        $view = 'client/register';
        require_once PATH_VIEW . 'main.php';
    }

    public function check()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataAll = $this->products->getAll();
            $user = $this->user->check($_POST['username'], $_POST['password'], $_POST['email']);

            if (!empty($user)) {
                $_SESSION['user'] = $user['username'];
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user['id'];

                $message = "<h1 style='color: green;'>Bạn đã đăng nhập thành công</h1>";
                $title = "Trang chủ";
                $view = 'client/home';
                require_once PATH_VIEW . 'main.php';
            } else {
                $_SESSION['msg'] = "Bạn đã đăng nhập thất bại, sai thông tin!";
                header('Location: ' . BASE_URL . '?action=login');
                exit;
            }
        }
    }

    public function into_admin()
    {
        $view = 'client/admin';
        require_once PATH_VIEW . 'main.php';
    }

    public function check_admin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $admin = $this->admin->check($data);
            if (empty($admin)) {
                $_SESSION['msg'] = 'Bạn đăng nhập thất bại';
                header('Location: ' . BASE_URL . '?action=into_admin');
            } else {
                $_SESSION['msg'] = 'Bạn đã đăng nhập thành công';
                header('Location: ' . BASE_URL . '?mode=admin');
            }
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL);
        exit;
    }

    public function lienhe()
    {
        $title = "Liên hệ";
        $view = 'client/lienhe';
        require_once PATH_VIEW . 'main.php';
    }

    public function detail()
    {
        if (isset($_GET['id'])) {
            $data = $this->products->get($_GET['id']);
            $data_comment = $this->comment->getByProduct($_GET['id']);
            $view = 'client/detail';
            require_once PATH_VIEW . 'main.php';
        }
    }

    function comment()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];
                $data = [
                    'content' => $_POST['content'],
                    'product_id' => $_POST['product_id'],
                    'user_id' => $user_id,
                ];
                $this->comment->add($data);
                header('Location: ' . BASE_URL . '?action=detail&id=' . $_POST['product_id']);
                exit;
            } else {
                $_SESSION['msg'] = 'Bạn phải đăng nhập mới được bình luận';
                header('Location: ' . BASE_URL . '?action=login');
                exit;
            }
        }
    }

    function search()
    {
        if (isset($_GET['search']) && trim($_GET['search']) != '') {
            $dataAll = $this->products->search($_GET['search']);
            $view = 'client/home';
            require_once PATH_VIEW . 'main.php';
        } else {
            $dataAll = $this->products->getAll();
            $view = 'client/home';
            require_once PATH_VIEW . 'main.php';
        }
    }

    public function addToCart()
    {
        $id = $_GET['id'] ?? 0;

        // Lấy thông tin sản phẩm
        $product = $this->products->get($id);

        if ($product) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ chưa
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] += 1;
            } else {
                // Thêm mới vào giỏ
                $_SESSION['cart'][$id] = [
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'thumbnail' => $product['thumbnail'],
                    'quantity' => 1
                ];
            }

            $_SESSION['msg'] = "Đã thêm sản phẩm";
        } else {
            $_SESSION['msg'] = "Sản phẩm không tồn tại!";
        }

        // Trở lại trang chi tiết sản phẩm
        header("Location: " . BASE_URL . "?action=detail&id=" . $id);
        exit;
    }
    public function cart()
    {
        $title = "Giỏ hàng";
        $view = 'client/cart';
        require_once PATH_VIEW . 'main.php';
    }
}
?>