<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .menu {
            background: #111;
            text-align: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 14px 24px;
            display: inline-block;
            font-weight: bold;
        }

        .menu a:hover {
            background: #333;
        }

        .product-img {
            height: 360px;
            background: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #666;
            font-weight: bold;
            border: 1px solid #ccc;
        }

        .price {
            color: red;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="menu">
        <a href="<?= BASE_URL ?>">Trang chủ</a>
        <a href="<?= BASE_URL ?>?act=products">Sản phẩm</a>
        <a href="<?= BASE_URL ?>?act=introduce">Giới thiệu</a>
        <a href="<?= BASE_URL ?>?act=contact">Liên hệ</a>

        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 1): ?>
            <a href="<?= BASE_URL ?>?act=admin-products">Quản lý</a>
        <?php endif; ?>

        <?php if (!empty($_SESSION['user'])): ?>
            <a href="<?= BASE_URL ?>?act=account">
                Xin chào, <?= $_SESSION['user']['name'] ?>
            </a>
            <a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>?act=login">Đăng nhập</a>
            <a href="<?= BASE_URL ?>?act=register">Đăng ký</a>
        <?php endif; ?>
    </div>

    <div class="container mt-5">

        <?php if (!empty($product)): ?>
            <div class="row">
                <div class="col-md-5">
                    <div class="product-img">
                        Ảnh sản phẩm
                    </div>
                </div>

                <div class="col-md-7">
                    <h2><?= $product['name'] ?></h2>

                    <p class="price">
                        <?= number_format($product['price']) ?> VNĐ
                    </p>

                    <p>
                        <?= $product['description'] ?>
                    </p>

                    <a href="<?= BASE_URL ?>?act=order&id=<?= $product['id'] ?>"
                        class="btn btn-dark">
                        Đặt mua
                    </a>

                    <a href="<?= BASE_URL ?>" class="btn btn-secondary">
                        Quay lại
                    </a>
                </div>
            </div>
        <?php else: ?>
            <h3>Không tìm thấy sản phẩm</h3>
            <a href="<?= BASE_URL ?>" class="btn btn-secondary">Quay lại</a>
        <?php endif; ?>

    </div>

</body>

</html>