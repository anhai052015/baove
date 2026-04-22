<?php
class AdminController
{
    public $product;
    public $category;
    public $user;

    public function __construct()
    {
        $this->product = new Products();
        $this->category = new Category();
        $this->user = new User();
    }

    public function index()
    {
        $data = $this->product->getAll();
        $view = 'admin/list';
        require_once PATH_VIEW . 'main.php';
    }

    public function userlist()
    {
        $users = $this->user->getAll();
        $view = 'admin/userlist';
        require_once PATH_VIEW . 'main.php';
    }

    function delete()
    {
        if (isset($_GET['id'])) {
            $this->product->delete($_GET['id']);
            header('Location: ' . BASE_URL_ADMIN);
            exit;
        }
    }

    function edit()
    {
        if (isset($_GET['id'])) {
            $product = $this->product->get($_GET['id']);
            $categories = $this->category->getAll();
            $view = 'admin/update';
            require_once PATH_VIEW . 'main.php';
        }
    }

    function create()
    {
        $data = $this->category->getAll();
        $view = 'admin/create';
        require_once PATH_VIEW . 'main.php';
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST + $_FILES;

            if (isset($data['thumbnail']) && $data['thumbnail']['size'] > 0) {
                $data['thumbnail'] = upload_file('img_ao', $data['thumbnail']);
            } else {
                $data['thumbnail'] = 'img_ao/1.jpg';
            }
            $this->product->add($data);
        }
        header('Location: ' . BASE_URL_ADMIN);
        exit;
    }

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST + $_FILES;
            $product = $this->product->get($_POST['id']);

            if (isset($data['thumbnail']) && $data['thumbnail']['size'] > 0) {
                $data['thumbnail'] = upload_file('img_ao', $data['thumbnail']);
            } else {
                $data['thumbnail'] = $product['thumbnail'];
            }

            $row = $this->product->update($data);

            if ($row > 0 && isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
                $old_image_path = PATH_ASSETS_UPLOADS . $product['thumbnail'];
                if (file_exists($old_image_path) && $product['thumbnail'] != 'img_ao/1.jpg') {
                    unlink($old_image_path);
                }
            }
        }
        header('Location: ' . BASE_URL_ADMIN);
        exit;
    }

    function deleteUser()
    {
        if (isset($_GET['id'])) {
            $this->user->delete($_GET['id']);
        }
        header('Location: ' . BASE_URL_ADMIN . '&action=userlist');
        exit;
    }

    function detail()
    {
        if (isset($_GET['id'])) {
            $product = $this->product->get($_GET['id']);
            $view = 'admin/detail';
            require_once PATH_VIEW . 'main.php';
        }
    }
}
?>