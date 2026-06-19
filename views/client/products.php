<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sản phẩm - Tiano Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            min-height: 100%;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            flex-direction: column;
        }

        .page-content {
            flex: 1;
        }

        .top {
            height: 45px;
            background: #f7f7f7;
            border-bottom: 1px solid #ddd;
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

        .title {
            text-align: center;
            font-weight: bold;
            margin: 40px 0 30px;
        }

        .product-card {
            border: none;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 28px;
            padding-bottom: 20px;
            background: #fff;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .product-img {
            height: 210px;
            background: linear-gradient(135deg, #e0e0e0, #f7f7f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .product-card h5 {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .price {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .detail-btn {
            border-radius: 4px;
            padding: 6px 16px;
            font-size: 13px;
        }

        .footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 14px;
            margin-top: 35px;
        }
    </style>
</head>

<body>

<div class="page-content">

    <div class="top">
        <div class="container d-flex justify-content-between align-items-center h-100">
            <strong>Tiano Shop</strong>

            <form method="GET" class="d-flex">
                <input type="hidden" name="act" value="products">

                <input class="form-control form-control-sm me-1"
                       type="text"
                       name="keyword"
                       placeholder="Tìm sản phẩm..."
                       value="<?= $_GET['keyword'] ?? '' ?>">

                <button class="btn btn-dark btn-sm">Tìm</button>
            </form>
        </div>
    </div>

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

    <div class="container">
        <h4 class="title">Sản phẩm của cửa hàng</h4>

        <div class="row">
            <?php $products = $products ?? []; ?>

            <?php if (empty($products)): ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Không tìm thấy sản phẩm phù hợp.
                    </div>
                </div>
            <?php endif; ?>

            <?php foreach ($products as $item): ?>
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-img">Ảnh sản phẩm</div>

                        <h5><?= $item['name'] ?></h5>

                        <div class="price">
                            <?= number_format($item['price']) ?> VNĐ
                        </div>

                        <a href="<?= BASE_URL ?>?act=detail&id=<?= $item['id'] ?>"
                           class="btn btn-dark btn-sm detail-btn">
                            Chi tiết
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<div class="footer">
    © 2026 - Tiano Shop
</div>

</body>
</html>