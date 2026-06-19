<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Tiano Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
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
            padding: 12px 22px;
            display: inline-block;
            font-weight: bold;
            font-size: 13px;
        }

        .menu a:hover {
            background: #333;
        }

        .banner {
            height: 330px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            color: #555;
        }

        .welcome {
            text-align: center;
            padding: 45px 0;
        }

        .welcome h3 {
            font-size: 18px;
            font-weight: bold;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .product-card {
            border: 1px solid #ddd;
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
        }

        .product-img {
            height: 210px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .product-card h5 {
            margin-top: 12px;
            font-size: 15px;
            font-weight: bold;
        }

        .price {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="top">
        <div class="container d-flex justify-content-between align-items-center h-100">
            <strong>Tiano Shop</strong>

            <form method="GET" class="d-flex">
                <input type="hidden" name="act" value="/">
                <input class="form-control form-control-sm me-1" type="text" name="keyword" placeholder="Tìm sản phẩm...">
                <button class="btn btn-dark btn-sm">Tìm</button>
            </form>
        </div>
    </div>

    <div class="menu">
        <a href="<?= BASE_URL ?>">Trang chủ</a>
        <a href="<?= BASE_URL ?>">Sản phẩm</a>
        <a href="#">Giới thiệu</a>
        <a href="#">Liên hệ</a>
        <a href="#">Quản lý</a>
        <a href="#">Thông tin tài khoản</a>
    </div>

    <div class="banner">
        BANNER TIANO SHOP
    </div>

    <div class="welcome">
        <h3>Chào mừng đến với Tiano Shop!</h3>
        <p>Chuyên cung cấp quần áo và phụ kiện thời trang</p>
        <a href="#products" class="btn btn-dark btn-sm">Xem tất cả sản phẩm</a>
    </div>

    <div class="container" id="products">
        <h4 class="section-title">Sản phẩm mới nhất</h4>

        <div class="row">
            <?php $products = $products ?? []; ?>
            <?php foreach ($products as $item): ?>
                <div class="col-md-6">
                    <div class="product-card">
                        <div class="product-img">Ảnh sản phẩm</div>

                        <h5><?= $item['name'] ?></h5>
                        <div class="price"><?= number_format($item['price']) ?> VNĐ</div>

                        <a href="?act=detail&id=<?= $item['id'] ?>" class="btn btn-dark btn-sm mt-2">
                            Chi tiết
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>