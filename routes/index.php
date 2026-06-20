<?php

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),
    'products' => (new HomeController())->products(),
    'detail' => (new HomeController())->detail(),
    'order' => (new HomeController())->order(),

    'introduce' => (new HomeController())->introduce(),
    'contact' => (new HomeController())->contact(),
    'account' => (new HomeController())->account(),

    'login' => (new HomeController())->login(),
    'register' => (new HomeController())->register(),
    'logout' => (new HomeController())->logout(),

    'admin-dashboard' => (new HomeController())->adminDashboard(),

    'admin-products' => (new HomeController())->adminProducts(),
    'admin-product-create' => (new HomeController())->adminProductCreate(),
    'admin-product-edit' => (new HomeController())->adminProductEdit(),
    'admin-product-delete' => (new HomeController())->adminProductDelete(),

    'admin-categories' => (new HomeController())->adminCategories(),
    'admin-users' => (new HomeController())->adminUsers(),

    'admin-comments' => (new HomeController())->adminComments(),
    'admin-comment-delete' => (new HomeController())->adminCommentDelete(),

    'admin-contacts' => (new HomeController())->adminContacts(),
    'admin-contact-delete' => (new HomeController())->adminContactDelete(),
    default => die('404 - Không tìm thấy trang'),
};
