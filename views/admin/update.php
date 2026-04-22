<style>
    .form-container {
        background: white;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
        margin: 20px auto;
    }

    .form-container label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    .form-container input,
    .form-container textarea,
    .form-container select,
    .form-container button {
        display: block;
        margin-top: 5px;
        margin-bottom: 10px;
        padding: 8px;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-container img {
        margin-top: 5px;
        margin-bottom: 15px;
        display: block;
        border-radius: 4px;
    }

    .form-container button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }

    .form-container button:hover {
        background-color: #45a049;
    }

    .back-btn {
        display: inline-block;
        margin-bottom: 15px;
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    .back-btn:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <a href="<?= BASE_URL_ADMIN ?>" class="back-btn">&laquo; Trở lại</a>

    <form action="<?= BASE_URL_ADMIN . '&action=update' ?>" method="post" enctype="multipart/form-data">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" value="<?= $product['name'] ?>" required>

        <label for="">Ảnh hiện tại</label>
        <img src="<?= BASE_ASSETS_UPLOADS . $product['thumbnail'] ?>" alt="Thumbnail" width="120">

        <label for="">Đổi ảnh (Bỏ trống nếu giữ nguyên)</label>
        <input type="file" name="thumbnail">

        <label for="">Giá</label>
        <input type="number" name="price" value="<?= $product['price'] ?>" required>

        <label for="">Mô tả</label>
        <textarea name="description" rows="3" required><?= $product['description'] ?></textarea>

        <label for="">Danh mục</label>
        <select name="category_id">
            <option value="<?= $product['category_id'] ?>" selected><?= $product['categoryName'] ?></option>
        </select>

        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <button type="submit">Lưu thay đổi</button>
    </form>
</div>