<h1 class="text-center my-4">Chi tiết sản phẩm</h1>
<a href="<?= BASE_URL ?>">Trở lại</a>
<div class="container shadow p-4 rounded">
    <div class="row align-items-center">

        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="<?= BASE_ASSETS_UPLOADS . $data['thumbnail'] ?>" alt="Ảnh sản phẩm" class="img-fluid rounded">
        </div>

        <div class="col-md-6">
            <h2 class="card-title"><?= $data['name'] ?></h2>
            <p class="card-text fs-5">Danh mục: <?= $data['categoryName'] ?></p>
            <p class="card-text fs-5">Mô tả: <?= $data['description'] ?></p>
            <p class="card-text text-danger fw-bold fs-3"><?= number_format($data['price']) ?>₫</p>
        </div>
    </div>

    <div class="text-center mt-5">
        <form action="<?= BASE_URL ?>" method="GET" class="d-inline">
            <input type="hidden" name="action" value="add_to_cart">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
            </button>
        </form>
    </div>

    <div class="comments-section mt-5">
        <h3 class="mb-4">Bình luận</h3>

        <form method="POST" action="<?= BASE_URL . '?action=comment' ?>">
            <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" rows="3" placeholder="Nhập bình luận..."
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Gửi bình luận</button>
        </form>

        <?php foreach ($data_comment as $comment) { ?>
            <div class="comment-item p-3 border rounded mb-3">
                <strong><?= $comment['username'] ?></strong><br>
                <p><?= $comment['content'] ?><br><small class="text-muted"><?= $comment['created_at'] ?></small></p>
            </div>
        <?php } ?>

    </div>
</div>

<style>
    .comments-section {
        border-top: 2px solid #ddd;
        padding-top: 20px;
    }

    .comment-item {
        background: #f9f9f9;
    }
</style>