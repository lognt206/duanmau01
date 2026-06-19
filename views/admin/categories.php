<?php
require_once PATH_VIEW . 'admin/layout.php';
adminHeader('Admin - Quản lý danh mục');
?>

<div class="box">
    <h2 class="page-title">Quản lý danh mục</h2>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th width="80">ID</th>
                <th>Tên danh mục</th>
            </tr>
        </thead>

        <tbody>
            <?php $categories = $categories ?? []; ?>

            <?php foreach ($categories as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($categories)): ?>
                <tr>
                    <td colspan="2" class="text-center">Chưa có danh mục</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php adminFooter(); ?>