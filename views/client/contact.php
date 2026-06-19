<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="text-center mb-4">Liên hệ</h2>

    <form>
        <div class="mb-3">
            <label>Họ tên</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nội dung</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>

        <button type="button" class="btn btn-dark w-100">
            Gửi liên hệ
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="<?= BASE_URL ?>">Về trang chủ</a>
    </div>
</div>
</body>
</html>