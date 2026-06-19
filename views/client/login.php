<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Tiano Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f3f3f3;
            font-family: Arial, sans-serif;
        }
        .login-box {
            max-width: 430px;
            margin: 80px auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.1);
        }
        h3 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3>Đăng nhập</h3>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-dark w-100">Đăng nhập</button>

        <div class="text-center mt-3">
            <a href="<?= BASE_URL ?>?act=register">Chưa có tài khoản? Đăng ký</a>
        </div>

        <div class="text-center mt-2">
            <a href="<?= BASE_URL ?>">Về trang chủ</a>
        </div>
    </form>
</div>

</body>
</html>