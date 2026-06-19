<?php
function adminHeader($title = 'Admin')
{
?>
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                background: #eef1f5;
                font-family: Arial, sans-serif;
            }

            .sidebar {
                width: 240px;
                height: 100vh;
                background: #111827;
                color: white;
                position: fixed;
                left: 0;
                top: 0;
                padding: 25px 0;
            }

            .sidebar h3 {
                text-align: center;
                font-weight: bold;
                margin-bottom: 30px;
            }

            .sidebar a {
                display: block;
                color: white;
                text-decoration: none;
                padding: 13px 25px;
                font-weight: bold;
            }

            .sidebar a:hover {
                background: #1f2937;
            }

            .content {
                margin-left: 240px;
                padding: 30px;
            }

            .box {
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
            }

            .page-title {
                font-weight: bold;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>

        <div class="sidebar">
            <h3>TIANO ADMIN</h3>

            <a href="<?= BASE_URL ?>?act=admin-products">Quản lý sản phẩm</a>
            <a href="<?= BASE_URL ?>?act=admin-categories">Quản lý danh mục</a>
            <a href="<?= BASE_URL ?>?act=admin-users">Quản lý tài khoản</a>
            <a href="<?= BASE_URL ?>">Xem website</a>
            <a href="<?= BASE_URL ?>?act=logout">Đăng xuất</a>
        </div>

        <div class="content">
        <?php
    }

    function adminFooter()
    {
        ?>
        </div>

    </body>

    </html>
<?php
    }
?>