<div class="content_header">
    <?php if (isset($message))
        echo $message; ?>
    <div class="btn_into">
        <a href="<?= BASE_URL . '?mode=admin&action=create' ?>"><button class="btn btn-primary">Thêm sản
                phẩm</button></a><br><br>
        <a href="<?= BASE_URL . '?mode=admin&action=userlist' ?>"><button class="btn btn-primary">Quản lý người
                dùng</button></a><br><br>
        <h1>Danh sách sản phẩm</h1>
    </div>
</div>
<hr>
<table class="table">
    <tr>
        <th>Định danh</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên hãng</th>
        <th>Mô tả</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($data as $v) { ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['name'] ?></td>
            <td><img src="<?= BASE_ASSETS_UPLOADS . $v['thumbnail'] ?>" alt="" width="100"></td>
            <td><?= $v['categoryName'] ?></td>
            <td><?= $v['description'] ?></td>
            <td><?= number_format($v['price']) ?>₫</td>
            <td>
                <a href="<?= BASE_URL . '?mode=admin&action=detail&id=' . $v['id'] ?>"><button class="btn btn-primary">Xem chi
                        tiết</button></a>
                <a href="<?= BASE_URL . '?mode=admin&action=edit&id=' . $v['id'] ?>"><button class="btn btn-warning">Sửa
                    </button></a>
                <a href="<?= BASE_URL . '?mode=admin&action=delete&id=' . $v['id'] ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"><button
                        class="btn btn-danger">Xóa </button></a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="<?= BASE_URL ?>">Trang chủ </a>
<style>
    h1 {
        display: flex;
        justify-content: center;
    }
</style>