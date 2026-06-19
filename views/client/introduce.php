<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f4f4f4; font-family:Arial, sans-serif; }
        .box {
            max-width: 850px; margin: 70px auto; background:white;
            padding: 40px; border-radius: 10px;
            box-shadow: 0 4px 18px rgba(0,0,0,.1);
        }
        h2 { font-weight:bold; text-align:center; margin-bottom:25px; }
        p { line-height:1.8; font-size:16px; }
    </style>
</head>
<body>

<div class="box">
    <h2>Giới thiệu Tiano Shop</h2>

    <p>
        Tiano Shop là website bán quần áo và phụ kiện thời trang, hướng đến phong cách trẻ trung,
        hiện đại và phù hợp với nhu cầu mua sắm online của người dùng.
    </p>

    <p>
        Website hỗ trợ các chức năng cơ bản như xem sản phẩm, tìm kiếm sản phẩm,
        xem chi tiết sản phẩm, đăng ký, đăng nhập và liên hệ với cửa hàng.
    </p>

    <p>
        Dự án được xây dựng nhằm áp dụng kiến thức HTML, CSS, Bootstrap, PHP, MySQL
        và mô hình MVC vào một website bán hàng thực tế.
    </p>

    <div class="text-center">
        <a href="<?= BASE_URL ?>" class="btn btn-dark">Về trang chủ</a>
    </div>
</div>

</body>
</html>