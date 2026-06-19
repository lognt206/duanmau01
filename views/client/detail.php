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
            padding: 12px 22px;
            display: inline-block;
            font-weight: bold;
            font-size: 13px;
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
    <a href="<?= BASE_URL ?>">Sản phẩm</a>
    <a href="#">Giới thiệu</a>
    <a href="#">Liên hệ</a>
    <a href="#">Quản lý</a>
    <a href="#">Thông tin tài khoản</a>
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

                <button class="btn btn-dark">Đặt mua</button>

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