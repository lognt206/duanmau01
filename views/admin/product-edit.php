<?php
$categories = $categories ?? [];
$product = $product ?? [
    'category_id' => '',
    'name' => '',
    'price' => '',
    'image' => '',
    'description' => '',
];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Sửa sản phẩm</h4>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Danh mục</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $item): ?>
                                <option value="<?= $item['id'] ?>"
                                    <?= $item['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                    <?= $item['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tên sản phẩm</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="<?= $product['name'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Giá</label>
                        <input type="number"
                            name="price"
                            class="form-control"
                            value="<?= $product['price'] ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ảnh hiện tại</label>
                        <br>

                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $product['image'] ?>"
                                width="150"
                                style="border-radius:8px;border:1px solid #ddd;padding:4px;">
                        <?php else: ?>
                            <span class="text-danger">Chưa có ảnh</span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Chọn ảnh mới (nếu muốn thay)
                        </label>

                        <input type="file"
                            name="image"
                            class="form-control"
                            accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description"
                            rows="5"
                            class="form-control"><?= $product['description'] ?></textarea>
                    </div>

                    <button class="btn btn-warning">
                        Cập nhật
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