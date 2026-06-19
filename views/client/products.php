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
            height: 55px;
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
            border-radius: 12px;
            text-align: center;
            margin-bottom: 30px;
            background: #fff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 330px;
            background: #f1f1f1;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }

        .product-img img:hover {
            transform: scale(1.05);
        }

        .no-img {
            color: #777;
            font-weight: bold;
        }

        .product-info {
            padding: 18px 12px 22px;
        }

        .product-card h5 {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-card h5 a {
            color: #111;
            text-decoration: none;
        }

        .product-card h5 a:hover {
            color: #dc3545;
        }

        .price {
            color: red;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 0;
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
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_ASSETS_UPLOADS ?>logo.png"
                     alt="Tiano Shop"
                     style="height:50px;">
            </a>

            <form method="GET" action="<?= BASE_URL ?>" class="d-flex">
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

                        <a href="<?= BASE_URL ?>?act=detail&id=<?= $item['id'] ?>">
                            <div class="product-img">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="<?= BASE_ASSETS_UPLOADS . $item['image'] ?>"
                                         alt="<?= $item['name'] ?>">
                                <?php else: ?>
                                    <span class="no-img">Chưa có ảnh</span>
                                <?php endif; ?>
                            </div>
                        </a>

                        <div class="product-info">
                            <h5>
                                <a href="<?= BASE_URL ?>?act=detail&id=<?= $item['id'] ?>">
                                    <?= $item['name'] ?>
                                </a>
                            </h5>

                            <div class="price">
                                <?= number_format($item['price']) ?> VNĐ
                            </div>
                        </div>

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