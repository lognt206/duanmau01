<?php
require_once PATH_VIEW . 'admin/layout.php';
adminHeader('Admin - Quản lý tài khoản');
?>

<div class="box">
    <h2 class="page-title">Quản lý tài khoản</h2>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
            <tr>
                <th width="80">ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>

        <tbody>
            <?php $users = $users ?? []; ?>

            <?php foreach ($users as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td>
                        <?= $item['role_id'] == 1 ? 'Admin' : 'Người dùng' ?>
                    </td>
                    <td><?= $item['created_at'] ?? '' ?></td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($users)): ?>
                <tr>
                    <td colspan="5" class="text-center">Chưa có tài khoản</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php adminFooter(); ?>