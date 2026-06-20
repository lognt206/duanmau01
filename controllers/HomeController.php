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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_SESSION['user'])) {
                $data = [
                    'product_id' => (int)$id,
                    'user_id' => $_SESSION['user']['id'],
                    'content' => $_POST['content'] ?? '',
                ];

                if ($data['content'] != '') {
                    $model->insertComment($data);
                }

                header('Location: ' . BASE_URL . '?act=detail&id=' . $id);
                exit;
            } else {
                header('Location: ' . BASE_URL . '?act=login');
                exit;
            }
        }

        $comments = $model->getCommentsByProduct((int)$id);

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
    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: ' . BASE_URL);
        exit;
    }
    public function introduce()
    {
        require_once PATH_VIEW . 'client/introduce.php';
    }

    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'message' => $_POST['message'] ?? '',
            ];

            $model = new BaseModel();
            $model->createContact($data);

            $success = 'Gửi liên hệ thành công!';
        }

        require_once PATH_VIEW . 'client/contact.php';
    }

    public function account()
    {
        if (empty($_SESSION['user'])) {
            header('Location: ' . BASE_URL . '?act=login');
            exit;
        }

        require_once PATH_VIEW . 'client/account.php';
    }
    public function order()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $product = $model->find('products', (int)$id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = 'Đặt hàng thành công!';
            require_once PATH_VIEW . 'client/order.php';
            return;
        }

        require_once PATH_VIEW . 'client/order.php';
    }
    public function adminProductCreate()
    {
        $model = new BaseModel();
        $categories = $model->getAll('categories');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $image = '';

            if (!empty($_FILES['image']['name'])) {

                $image = time() . '_' . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    PATH_ASSETS_UPLOADS . $image
                );
            }

            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'image' => $image,
                'description' => $_POST['description'] ?? '',
            ];

            $model->insertProduct($data);

            header('Location: ' . BASE_URL . '?act=admin-products');
            exit;
        }

        require_once PATH_VIEW . 'admin/product-create.php';
    }

    public function adminProductEdit()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $product = $model->find('products', (int)$id);
        $categories = $model->getAll('categories');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $image = $product['image'];

            if (!empty($_FILES['image']['name'])) {

                $image = time() . '_' . $_FILES['image']['name'];

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    PATH_ASSETS_UPLOADS . $image
                );
            }

            $data = [
                'category_id' => $_POST['category_id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'image' => $image,
                'description' => $_POST['description'] ?? '',
            ];

            $model->updateProduct((int)$id, $data);

            header('Location: ' . BASE_URL . '?act=admin-products');
            exit;
        }

        require_once PATH_VIEW . 'admin/product-edit.php';
    }

    public function adminProductDelete()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $model->delete('products', (int)$id);

        header('Location: ' . BASE_URL . '?act=admin-products');
        exit;
    }
    public function adminCategories()
    {
        $model = new BaseModel();

        $categories = $model->getAll('categories');

        require_once PATH_VIEW . 'admin/categories.php';
    }

    public function adminUsers()
    {
        $model = new BaseModel();

        $users = $model->getAll('users');

        require_once PATH_VIEW . 'admin/users.php';
    }
    public function adminComments()
    {
        $model = new BaseModel();
        $comments = $model->getAllComments();

        require_once PATH_VIEW . 'admin/comments.php';
    }

    public function adminCommentDelete()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $model->delete('comments', (int)$id);

        header('Location: ' . BASE_URL . '?act=admin-comments');
        exit;
    }
    public function adminDashboard()
    {
        $model = new BaseModel();

        $totalProducts = $model->countTable('products');
        $totalCategories = $model->countTable('categories');
        $totalUsers = $model->countTable('users');
        $totalComments = $model->countTable('comments');
        $totalContacts = $model->countTable('contacts');

        require_once PATH_VIEW . 'admin/dashboard.php';
    }
    public function adminContacts()
    {
        $model = new BaseModel();

        $contacts = $model->getAll('contacts');

        require_once PATH_VIEW . 'admin/contacts.php';
    }

    public function adminContactDelete()
    {
        $id = $_GET['id'] ?? 0;

        $model = new BaseModel();
        $model->delete('contacts', (int)$id);

        header('Location: ' . BASE_URL . '?act=admin-contacts');
        exit;
    }
}
