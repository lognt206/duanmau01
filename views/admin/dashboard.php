<?php
$totalProducts = $totalProducts ?? 0;
$totalCategories = $totalCategories ?? 0;
$totalUsers = $totalUsers ?? 0;
$totalComments = $totalComments ?? 0;
$totalContacts = $totalContacts ?? 0;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #eef1f5;
            font-family: Arial, sans-serif;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background: #0f172a;
            color: white;
            padding-top: 20px;
        }

        .sidebar h3 {
            padding: 0 20px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            padding: 14px 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1e293b;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .card-box {
            border-radius: 12px;
            padding: 25px;
            color: white;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 3px 12px rgba(0,0,0,.15);
        }

        .card-box h2 {
            margin: 10px 0;
        }

        .bg-blue { background: #2563eb; }
        .bg-green { background: #16a34a; }
        .bg-orange { background: #ea580c; }
        .bg-purple { background: #7c3aed; }
        .bg-red { background: #dc2626; }
    </style>
</head>

<body>

<div class="admin-layout">

    <div class="sidebar">

        <h3>TIANO ADMIN</h3>

        <a href="<?= BASE_URL ?>?act=admin-dashboard" class="active">Dashboard</a>
        <a href="<?= BASE_URL ?>?act=admin-products">Quản lý sản phẩm</a>
        <a href="<?= BASE_URL ?>?act=admin-categories">Quản lý danh mục</a>
        <a href="<?= BASE_URL ?>?act=admin-users">Quản lý tài khoản</a>
        <a href="<?= BASE_URL ?>?act=admin-comments">Quản lý bình luận</a>
        <a href="<?= BASE_URL ?>?act=admin-contacts">Quản lý liên hệ</a>
        <a href="<?= BASE_URL ?>">Xem website</a>
        <a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a>

    </div>

    <div class="content">

        <h2 class="mb-4 fw-bold">Dashboard</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card-box bg-blue">
                    <div>Tổng sản phẩm</div>
                    <h2><?= $totalProducts ?></h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box bg-green">
                    <div>Tổng danh mục</div>
                    <h2><?= $totalCategories ?></h2>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-box bg-orange">
                    <div>Tổng tài khoản</div>
                    <h2><?= $totalUsers ?></h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-box bg-purple">
                    <div>Tổng bình luận</div>
                    <h2><?= $totalComments ?></h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-box bg-red">
                    <div>Tổng liên hệ</div>
                    <h2><?= $totalContacts ?></h2>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>