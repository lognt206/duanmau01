<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm - Tiano Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .top { height: 45px; background: #f7f7f7; border-bottom: 1px solid #ddd; }
        .menu { background: #111; text-align: center; }
        .menu a {
            color: white; text-decoration: none; padding: 12px 22px;
            display: inline-block; font-weight: bold; font-size: 13px;
        }
        .menu a:hover { background: #333; }
        .title { text-align: center; font-weight: bold; margin: 35px 0 25px; }
        .product-card {
            border: 1px solid #ddd; text-align: center; margin-bottom: 25px;
            padding-bottom: 15px; background: white;
        }
        .product-img {
            height: 170px; background: #ddd; display: flex;
            align-items: center; justify-content: center; color: #777;
        }
        .product-card h5 { margin-top: 12px; font-size: 15px; font-weight: bold; }
        .price { color: red; font-weight: bold; }
        .footer {
            background: #111; color: white; text-align: center;
            padding: 12px; margin-top: 20px; font-size: 13px;
        }
    </style>
</head>

<body>

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
    <a href="#">Giới thiệu</a>
    <a href="#">Liên hệ</a>
    <a href="<?= BASE_URL ?>?act=admin-products">Quản lý</a>
    <a href="#">Thông tin tài khoản</a>
</div>

<div class="container">
    <h4 class="title">Sản phẩm của cửa hàng</h4>

    <div class="row">
        <?php $products = $products ?? []; ?>

        <?php foreach ($products as $item): ?>
            <div class="col-md-6">
                <div class="product-card">
                    <div class="product-img">Ảnh sản phẩm</div>

                    <h5><?= $item['name'] ?></h5>

                    <div class="price">
                        <?= number_format($item['price']) ?> VNĐ
                    </div>

                    <a href="<?= BASE_URL ?>?act=detail&id=<?= $item['id'] ?>">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
</div>

<div class="footer">
    © 2026 - Tiano Shop
</div>

</body>
</html>