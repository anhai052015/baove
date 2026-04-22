<div class="container mt-4 mb-5">
    <h2 class="text-center mb-4" style="color: #333;">Giỏ hàng của bạn</h2>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col" class="text-center">Đơn giá</th>
                        <th scope="col" class="text-center">Số lượng</th>
                        <th scope="col" class="text-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalAmount = 0;
                    foreach ($_SESSION['cart'] as $id => $item):
                        $itemTotal = $item['price'] * $item['quantity'];
                        $totalAmount += $itemTotal;
                        ?>
                        <tr>
                            <td class="text-center">
                                <img src="<?= BASE_ASSETS_UPLOADS . $item['thumbnail'] ?>" alt="<?= $item['name'] ?>"
                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            </td>
                            <td><span class="fw-bold fs-5"><?= $item['name'] ?></span></td>
                            <td class="text-center text-danger fw-bold"><?= number_format($item['price']) ?>₫</td>
                            <td class="text-center">
                                <span class="badge bg-secondary fs-6 px-3 py-2"><?= $item['quantity'] ?></span>
                            </td>
                            <td class="text-center text-danger fw-bold"><?= number_format($itemTotal) ?>₫</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold fs-5 pt-3">Tổng thanh toán:</td>
                        <td class="text-center text-danger fw-bold fs-4 pt-3"><?= number_format($totalAmount) ?>₫</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-end mt-4">
            <a href="<?= BASE_URL ?>" class="btn btn-outline-primary btn-lg me-2">Tiếp tục mua sắm</a>
            <a href="#" class="btn btn-success btn-lg fw-bold shadow-sm">Tiến hành thanh toán</a>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center fs-5 py-5 shadow-sm rounded" role="alert">
            <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i><br>
            Giỏ hàng của bạntrống!<br>
            <a href="<?= BASE_URL ?>" class="btn btn-primary mt-4 fw-bold">Quay lại cửa hàng</a>
        </div>
    <?php endif; ?>
</div>