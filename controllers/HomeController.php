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
}
