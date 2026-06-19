<?php
require_once PATH_VIEW . 'admin/layout.php';
adminHeader('Admin - Quản lý sản phẩm');
?>

<div class="box">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="page-title">Quản lý sản phẩm</h2>

        <a href="<?= BASE_URL ?>?act=admin-product-create" class="btn btn-success">
            + Thêm sản phẩm
        </a>
    </div>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
                <th width="160">Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php $products = $products ?? []; ?>

            <?php foreach ($products as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= number_format($item['price']) ?> VNĐ</td>
                    <td>
                        <?php if (!empty($item['image'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $item['image'] ?>"
                                width="90"
                                height="70"
                                style="object-fit:cover;border-radius:6px;">
                        <?php else: ?>
                            Chưa có ảnh
                        <?php endif; ?>
                    </td>
                    <td><?= $item['description'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>?act=admin-product-edit&id=<?= $item['id'] ?>"
                            class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        <a href="<?= BASE_URL ?>?act=admin-product-delete&id=<?= $item['id'] ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa?')"
                            class="btn btn-danger btn-sm">
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="6" class="text-center">Chưa có sản phẩm</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php adminFooter(); ?>