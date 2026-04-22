<?php

class HomeController
{
    public $products;
    public $category;
    public $user;
    public $comment;

    function __construct()
    {
        $this->products = new Products();
        $this->category = new Category();
        $this->user = new User();
        $this->comment = new Comment();
    }

    public function index()
    {
        if (isset($_GET['category'])) {
            $dataAll = $this->products->category($_GET['category']);
            $view = 'client/home';
            require_once PATH_VIEW . 'main.php';
            exit;
        }

        $dataAll = $this->products->getAll();
        $title = "";
        $view = 'client/home';
        require_once PATH_VIEW . 'main.php';
    }

    public function get()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->products->get($id);

            if (empty($data)) {
                header('Location: ' . BASE_URL);
                exit;
            }
        } else {
            header('Location: ' . BASE_URL);
            exit;
        }

        $comment = $this->comment->getAll();
        $data_comment = [];

        foreach ($comment as $v) {
            if (isset($v['product_id']) && $v['product_id'] == $id) {
                $user = $this->user->get($v['user_id']);
                if ($user) {
                    $data_comment[] = [
                        'created_at' => $v['created_at'],
                        'content' => $v['content'],
                        'username' => $user['username'],
                    ];
                } else {
                    $data_comment[] = [
                        'created_at' => $v['created_at'],
                        'content' => $v['content'],
                        'username' => '[Người dùng đã xóa]',
                    ];
                }
            }
        }

        $view = 'client/detail';
        $title = "Chi tiết sản phẩm";
        require_once PATH_VIEW . 'main.php';
    }
}
?>