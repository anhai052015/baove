<style>
    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    th {
        background: #f4f4f4;
    }

    a.btn {
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
    }

    .btn-edit {
        background: #4CAF50;
        color: white;
    }

    .btn-delete {
        background: #E74C3C;
        color: white;
    }
</style>

<h1>Quản lý người dùng</h1>
<a href="<?= BASE_URL_ADMIN ?>">Trở lại</a>
<table>
    <tr>
        <th>ID</th>
        <th>Tên đăng nhập</th>
        <th>Email</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
    </tr>

    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['date'] ?></td>
                <td>
                    <a href="<?= BASE_URL_ADMIN . '&action=deleteUser&id=' . $user['id'] ?>" class="btn btn-delete"
                        onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Chưa có người dùng nào.</td>
        </tr>
    <?php endif; ?>
</table>