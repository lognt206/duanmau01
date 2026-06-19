<?php

$product = $product ?? [
    'name' => ''
];

$success = $success ?? '';

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đặt mua sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
            font-family: Arial;
        }

        .box {
            max-width: 650px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .1);
        }

        h3 {
            margin-bottom: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="box">

    <h3>
        Đặt mua:
        <?= $product['name'] ?>
    </h3>

    <?php if (!empty($success)): ?>

        <div class="alert alert-success">
            <?= $success ?>
        </div>

        <div class="d-flex gap-2">

            <a href="<?= BASE_URL ?>"
               class="btn btn-dark">
                Về trang chủ
            </a>

            <a href="<?= BASE_URL ?>?act=products"
               class="btn btn-secondary">
                Tiếp tục mua
            </a>

        </div>

    <?php else: ?>

        <form method="POST">

            <div class="mb-3">
                <label>Họ tên</label>
                <input type="text"
                       class="form-control"
                       name="name"
                       required>
            </div>

            <div class="mb-3">
                <label>Số điện thoại</label>
                <input type="text"
                       class="form-control"
                       name="phone"
                       required>
            </div>

            <div class="mb-3">
                <label>Địa chỉ giao hàng</label>

                <textarea
                    class="form-control"
                    rows="4"
                    name="address"
                    required></textarea>
            </div>

            <div class="d-flex gap-2">

                <button class="btn btn-success">
                    Xác nhận mua
                </button>

                <a href="javascript:history.back()"
                   class="btn btn-secondary">
                    Quay lại
                </a>

            </div>

        </form>

    <?php endif; ?>

</div>

</body>
</html>