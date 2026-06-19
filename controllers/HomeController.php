<?php

class HomeController
{
    public function index()
    {
        $model = new BaseModel();

        $keyword = $_GET['keyword'] ?? '';

        if ($keyword != '') {
            $products = $model->searchProducts($keyword);
        } else {
            $products = $model->getAll('products');
        }
        $categories = $model->getAll('categories');
        $products = array_slice(
            $model->getAll('products'),
            0,
            4
        );
        require_once PATH_VIEW . 'client/main.php';
    }

    public function detail()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $product = $model->find('products', (int)$id);

        require_once PATH_VIEW . 'client/detail.php';
    }
    public function adminProducts()
    {
        $model = new BaseModel();

        $products = $model->getAll('products');

        require_once PATH_VIEW . 'admin/products.php';
    }
    public function products()
    {
        $model = new BaseModel();

        $keyword = $_GET['keyword'] ?? '';

        if (!empty($keyword)) {
            $products = $model->searchProducts($keyword);
        } else {
            $products = $model->getAll('products');
        }

        require_once PATH_VIEW . 'client/products.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new BaseModel();
            $user = $model->findUserByEmail($email);

            if ($user && $user['password'] == $password) {
                $_SESSION['user'] = $user;

                if ($user['role_id'] == 1) {
                    header('Location: ' . BASE_URL . '?act=admin-products');
                    exit;
                }

                header('Location: ' . BASE_URL);
                exit;
            }

            $error = 'Email hoặc mật khẩu không đúng';
        }

        require_once PATH_VIEW . 'client/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if ($password != $confirmPassword) {
                $error = 'Mật khẩu xác nhận không khớp';
                require_once PATH_VIEW . 'client/register.php';
                return;
            }

            $data = [
                'role_id' => 2,
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $password,
                'phone' => '',
                'address' => '',
            ];

            $model = new BaseModel();
            $model->createUser($data);

            header('Location: ' . BASE_URL . '?act=login');
            exit;
        }

        require_once PATH_VIEW . 'client/register.php';
    }
}
