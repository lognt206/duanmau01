<?php

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController())->index(),
    'detail' => (new HomeController())->detail(),
    default => die('404 - Không tìm thấy trang'),
};