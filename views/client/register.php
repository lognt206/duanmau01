<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - Tiano Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Đăng ký tài khoản</h3>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>

        <button class="btn btn-dark w-100">Đăng ký</button>

        <div class="text-center mt-3">
            <a href="<?= BASE_URL ?>?act=login">Đã có tài khoản? Đăng nhập</a>
        </div>

        <div class="text-center mt-2">
            <a href="<?= BASE_URL ?>">Về trang chủ</a>
        </div>
    </form>
</div>

</body>
</html>