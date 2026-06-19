<?php

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),
    'detail' => (new HomeController())->detail(),

    'admin-products' => (new HomeController())->adminProducts(),

    default => die('404 - Không tìm thấy trang'),
};