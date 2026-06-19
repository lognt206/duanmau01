<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5" style="max-width: 600px;">
    <h2>Thông tin tài khoản</h2>

    <table class="table table-bordered mt-3">
        <tr>
            <th>Họ tên</th>
            <td><?= $_SESSION['user']['name'] ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?= $_SESSION['user']['email'] ?></td>
        </tr>

        <tr>
            <th>Vai trò</th>
            <td><?= $_SESSION['user']['role_id'] == 1 ? 'Admin' : 'Người dùng' ?></td>
        </tr>
    </table>

    <a href="<?= BASE_URL ?>" class="btn btn-dark">Về trang chủ</a>
</div>
</body>
</html>