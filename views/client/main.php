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
            background: #fff;
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

        .banner-img {
            height: 420px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .welcome {
            text-align: center;
            padding: 50px 0 30px;
        }

        .welcome h3 {
            font-size: 18px;
            font-weight: bold;
        }

        .product-img {
            height: 180px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
        }

        .footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 12px;
            margin-top: 30px;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="top">
        <div class="container d-flex justify-content-between align-items-center h-100">
            <a href="<?= BASE_URL ?>">
                <img src="<?= BASE_ASSETS_UPLOADS ?>logo.png"
                    alt="Tiano Shop"
                    style="height:45px;">
            </a>

            <form method="GET" action="<?= BASE_URL ?>" class="d-flex">
                <input type="hidden" name="act" value="products">
                <input class="form-control form-control-sm me-1"
                    type="text"
                    name="keyword"
                    placeholder="Tìm sản phẩm...">
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

    <div id="bannerCarousel"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="2500"
        data-bs-pause="false">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="<?= BASE_URL ?>assets/uploads/banner1.png"
                    class="d-block w-100 banner-img"
                    alt="Banner 1">
            </div>

            <div class="carousel-item">
                <img src="<?= BASE_URL ?>assets/uploads/banner2.png"
                    class="d-block w-100 banner-img"
                    alt="Banner 2">
            </div>

            <div class="carousel-item">
                <img src="<?= BASE_URL ?>assets/uploads/banner3.png"
                    class="d-block w-100 banner-img"
                    alt="Banner 3">
            </div>

        </div>

        <button class="carousel-control-prev"
            type="button"
            data-bs-target="#bannerCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next"
            type="button"
            data-bs-target="#bannerCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <div class="welcome">
        <h3>Chào mừng đến với Tiano Shop!</h3>
        <p>Chuyên cung cấp quần áo và phụ kiện thời trang</p>
        <a href="<?= BASE_URL ?>?act=products" class="btn btn-dark btn-sm">
            Xem tất cả sản phẩm
        </a>
    </div>

    <div class="container mt-4">
        <h4 class="text-center mb-4 fw-bold">Sản phẩm nổi bật</h4>

        <div class="row">
            <?php $products = $products ?? []; ?>

            <?php foreach ($products as $item): ?>
                <div class="col-md-3 mb-4">
                    <div class="card text-center h-100">
                        <div class="product-img">
                            <?php if (!empty($item['image'])): ?>
                                <img src="<?= BASE_ASSETS_UPLOADS . $item['image'] ?>"
                                    style="width:100%;height:100%;object-fit:cover;">
                            <?php else: ?>
                                Ảnh sản phẩm
                            <?php endif; ?>
                        </div>

                        <div class="card-body">
                            <h6 class="fw-bold"><?= $item['name'] ?></h6>

                            <p class="text-danger fw-bold">
                                <?= number_format($item['price']) ?> VNĐ
                            </p>

                            <a href="<?= BASE_URL ?>?act=detail&id=<?= $item['id'] ?>"
                                class="btn btn-dark btn-sm">
                                Chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-2">
            <a href="<?= BASE_URL ?>?act=products" class="btn btn-outline-dark">
                Xem tất cả sản phẩm
            </a>
        </div>
    </div>

    <div class="footer">
        © 2026 - Tiano Shop
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>