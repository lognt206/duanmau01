<?php
$categories = $categories ?? [];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5">

    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Thêm sản phẩm</h4>
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Danh mục</label>

                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $item): ?>
                                <option value="<?= $item['id'] ?>">
                                    <?= $item['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tên sản phẩm</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Giá</label>

                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh sản phẩm</label>

                        <input type="file"
                            name="image"
                            class="form-control"
                            accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label>Mô tả</label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control"></textarea>
                    </div>

                    <button class="btn btn-success">
                        Thêm sản phẩm
                    </button>

                    <a href="<?= BASE_URL ?>?act=admin-products"
                        class="btn btn-secondary">
                        Quay lại
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>

</html>