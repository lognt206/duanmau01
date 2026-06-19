<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f4f4f4; font-family:Arial, sans-serif; }
        .box {
            max-width: 700px; margin: 70px auto; background:white;
            padding: 35px; border-radius: 10px;
            box-shadow: 0 4px 18px rgba(0,0,0,.1);
        }
        h2 { font-weight:bold; text-align:center; margin-bottom:25px; }
        th { width: 220px; background:#f7f7f7; }
    </style>
</head>
<body>

<div class="box">
    <h2>Thông tin tài khoản</h2>

    <table class="table table-bordered">
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

    <div class="text-center">
        <a href="<?= BASE_URL ?>" class="btn btn-dark">Về trang chủ</a>
    </div>
</div>

</body>
</html>