<?php
$productsList = $dataAll ?? [];
$categoryList = $categories ?? [];
?>

<h1 class="mt-4 mb-4 text-center" style="color:#333;">Danh sách sản phẩm</h1>

<form action="<?= BASE_URL ?>" method="get" class="mb-4"
    style="display:flex; justify-content:center; max-width:600px; margin:0 auto;">
    <input type="hidden" name="action" value="search">
    <input type="text" name="search" class="form-control" placeholder="Nhập tên sản phẩm cần tìm...">
    <button type="submit" class="btn btn-primary ms-2">Tìm kiếm</button>
</form>

<div class="d-flex justify-content-center mb-4 gap-3 flex-wrap">
    <a href="<?= BASE_URL ?>"
        class="btn <?= (!isset($_GET['action']) || $_GET['action'] != 'category') ? 'btn-primary' : 'btn-outline-primary' ?> fw-bold">
        Tất cả
    </a>
    <?php if (!empty($categoryList)): ?>
        <?php foreach ($categoryList as $cat): ?>
            <a href="<?= BASE_URL . '?action=category&id=' . $cat['id'] ?>"
                class="btn <?= (isset($_GET['id']) && $_GET['id'] == $cat['id']) ? 'btn-primary' : 'btn-outline-primary' ?> fw-bold">
                <?= $cat['name'] ?>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="row">
    <?php if (is_array($productsList) && count($productsList) > 0): ?>
        <?php foreach ($productsList as $v): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="<?= BASE_URL . '?action=detail&id=' . $v['id'] ?>">
                        <img src="assets/uploads/<?= $v['thumbnail'] ?>" class="card-img-top" alt="Hình sản phẩm"
                            style="object-fit: cover; height: 250px;">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold"><?= $v['name'] ?></h5>
                        <p class="card-text text-muted">Danh mục: <?= $v['categoryName'] ?? 'Chưa phân loại' ?></p>
                        <p class="card-text text-danger fw-bold fs-5"><?= number_format($v['price']) ?>₫</p>
                    </div>
                    <div class="card-footer text-center bg-white border-top-0 pb-3">
                        <a href="<?= BASE_URL . '?action=detail&id=' . $v['id'] ?>" class="btn btn-outline-primary w-75">Xem chi
                            tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h4 class="text-center text-danger w-100 mt-5 mb-5">
            Không tìm thấy sản phẩm nào trong danh mục này!
        </h4>
    <?php endif; ?>
</div>