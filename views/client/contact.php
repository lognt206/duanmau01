<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .box {
            max-width: 650px;
            margin: 60px auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 4px 18px rgba(0,0,0,.1);
        }

        h2 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Liên hệ với Tiano Shop</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Nhập họ tên"
                   required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Nhập email"
                   required>
        </div>

        <div class="mb-3">
            <label>Nội dung</label>
            <textarea name="message"
                      class="form-control"
                      rows="5"
                      placeholder="Nhập nội dung liên hệ"
                      required></textarea>
        </div>

        <button class="btn btn-dark w-100">
            Gửi liên hệ
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="<?= BASE_URL ?>">Về trang chủ</a>
    </div>
</div>

</body>
</html>