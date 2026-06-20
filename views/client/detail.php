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
            background: #f5f5f5;
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

        .detail-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
        }

        .product-img {
            height: 420px;
            background: #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #666;
            font-weight: bold;
            border: 1px solid #ccc;
            overflow: hidden;
            border-radius: 8px;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .price {
            color: red;
            font-size: 22px;
            font-weight: bold;
        }

        .comment-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
            margin-top: 30px;
        }

        .comment-item {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 12px;
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

<div class="container mt-5 mb-5">

    <?php if (!empty($product)): ?>

        <div class="detail-box">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-img">
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>"
                                 alt="<?= $product['name'] ?>">
                        <?php else: ?>
                            Ảnh sản phẩm
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-7">
                    <h2 class="fw-bold"><?= $product['name'] ?></h2>

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

                    <a href="javascript:history.back()"
                       class="btn btn-secondary">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>

        <div class="comment-box">
            <h4 class="fw-bold mb-3">Bình luận sản phẩm</h4>

            <?php if (!empty($_SESSION['user'])): ?>

                <form method="POST" class="mb-4">
                    <div class="mb-3">
                        <textarea name="content"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Nhập bình luận của bạn..."
                                  required></textarea>
                    </div>

                    <button class="btn btn-dark">
                        Gửi bình luận
                    </button>
                </form>

            <?php else: ?>

                <div class="alert alert-warning">
                    Vui lòng đăng nhập để bình luận.
                </div>

            <?php endif; ?>

            <?php $comments = $comments ?? []; ?>

            <?php if (empty($comments)): ?>
                <p class="text-muted">Chưa có bình luận nào.</p>
            <?php endif; ?>

            <?php foreach ($comments as $comment): ?>
                <div class="comment-item">
                    <strong><?= $comment['user_name'] ?></strong>

                    <p class="mb-1">
                        <?= $comment['content'] ?>
                    </p>

                    <small class="text-muted">
                        <?= $comment['created_at'] ?>
                    </small>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>

        <div class="alert alert-danger">
            Không tìm thấy sản phẩm.
        </div>

        <a href="javascript:history.back()"
           class="btn btn-secondary">
            Quay lại
        </a>

    <?php endif; ?>

</div>

</body>
</html>