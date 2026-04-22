<style>
  a {
    display: inline-block;
    margin: 20px auto 10px;
    text-decoration: none;
    color: #007BFF;
    font-weight: 600;
  }

  a:hover {
    text-decoration: underline;
  }

  form {
    max-width: 450px;
    margin: 0 auto 40px;
    padding: 25px 30px;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  form p {
    margin-bottom: 18px;
  }

  form label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
  }

  form input[type="text"],
  form input[type="number"],
  form select,
  form input[type="file"] {
    width: 100%;
    padding: 10px 12px;
    font-size: 1rem;
    border: 1.5px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  form input[type="text"]:focus,
  form input[type="number"]:focus,
  form select:focus,
  form input[type="file"]:focus {
    border-color: #007BFF;
    outline: none;
  }

  form button {
    width: 100%;
    padding: 12px 0;
    font-size: 1.1rem;
    font-weight: 700;
    background-color: #007BFF;
    border: none;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  form button:hover {
    background-color: #0056b3;
  }
</style>

<a href="<?= BASE_URL_ADMIN ?>">Trở lại</a>

<form action="<?= BASE_URL . '?mode=admin&action=add' ?>" method="post" enctype="multipart/form-data">
  <p>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>
  </p>
  <p>
    <label for="category_id">Category ID</label>
    <select name="category_id" id="category_id" required>
      <?php foreach ($data as $v) { ?>
        <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
      <?php } ?>
    </select>
  </p>
  <p>
    <label for="description">Description</label>
    <input type="text" name="description" id="description" required>
  </p>
  <p>
    <label for="price">Price</label>
    <input type="number" name="price" id="price" required>
  </p>
  <p>
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" required>
  </p>
  <button type="submit">Lưu</button>
</form>