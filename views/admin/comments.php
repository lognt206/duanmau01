<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý bình luận</title>
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
            background: #111827;
            color: white;
            padding-top: 20px;
        }

        .sidebar h3 {
            font-weight: bold;
            padding: 0 18px;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 14px 18px;
            font-weight: bold;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1f2937;
        }

        .content {
            flex: 1;
            padding: 28px;
        }

        .box {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
        }

        table th {
            background: #212529 !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <div class="admin-layout">

        <div class="sidebar">
            <h3>TIANO ADMIN</h3>

            <a href="<?= BASE_URL ?>?act=admin-dashboard">Dashboard</a>
            <a href="<?= BASE_URL ?>?act=admin-products">Quản lý sản phẩm</a>
            <a href="<?= BASE_URL ?>?act=admin-categories">Quản lý danh mục</a>
            <a href="<?= BASE_URL ?>?act=admin-users">Quản lý tài khoản</a>
            <a href="<?= BASE_URL ?>?act=admin-comments" class="active">Quản lý bình luận</a>
            <a href="<?= BASE_URL ?>?act=admin-contacts">Quản lý liên hệ</a>
            <a href="<?= BASE_URL ?>">Xem website</a>
            <a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a>
        </div>

        <div class="content">
            <div class="box">

                <h2 class="mb-4 fw-bold">Quản lý bình luận</h2>

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người dùng</th>
                            <th>Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th width="100">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $comments = $comments ?? []; ?>

                        <?php if (empty($comments)): ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    Chưa có bình luận nào.
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($comments as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['user_name'] ?></td>
                                <td><?= $item['product_name'] ?></td>
                                <td><?= $item['content'] ?></td>
                                <td><?= $item['created_at'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>?act=admin-comment-delete&id=<?= $item['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Xóa bình luận này?')">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>