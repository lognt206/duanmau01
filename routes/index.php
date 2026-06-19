<?php

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),
    'products' => (new HomeController())->products(),
    'detail' => (new HomeController())->detail(),

    'introduce' => (new HomeController())->introduce(),
    'contact' => (new HomeController())->contact(),
    'account' => (new HomeController())->account(),

    'login' => (new HomeController())->login(),
    'register' => (new HomeController())->register(),
    'logout' => (new HomeController())->logout(),

    'admin-products' => (new HomeController())->adminProducts(),

    default => die('404 - Không tìm thấy trang'),
};
