<a href="<?= BASE_URL_ADMIN ?>">Trở lại</a>
<table class="table">
    <tr>
        <th>Định danh</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên hãng</th>
        <th>Mô tả</th>
        <th>Giá</th>
    </tr>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><img src="<?= BASE_ASSETS_UPLOADS . $product['thumbnail'] ?>" alt="" width="100"></td>
        <td><?= $product['categoryName'] ?></td>
        <td><?= $product['description'] ?></td>
        <td><?= $product['price'] ?></td>
    </tr>
</table>