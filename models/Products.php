<?php
class Products extends BaseModel
{
    function getAll()
    {
        $sql = "SELECT products.*, category.name AS categoryName
                FROM products
                LEFT JOIN category ON products.category_id = category.id
                ORDER BY products.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function category($category_id)
    {
        $sql = "SELECT products.*, category.name AS categoryName
                FROM products
                LEFT JOIN category ON products.category_id = category.id
                WHERE products.category_id = :category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category' => $category_id]);
        return $stmt->fetchAll();
    }

    function get($id)
    {
        $sql = "SELECT products.*, category.name AS categoryName
                FROM products
                LEFT JOIN category ON products.category_id = category.id
                WHERE products.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }

    function add($data)
    {
        $sql = "INSERT INTO products (name, thumbnail, price, description, category_id) 
                VALUES (:name, :thumbnail, :price, :description, :category_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $data['name'],
            ':thumbnail' => $data['thumbnail'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':category_id' => $data['category_id']
        ]);
    }

    function update($data)
    {
        $sql = "UPDATE products 
                SET name = :name, thumbnail = :thumbnail, price = :price, 
                    description = :description, category_id = :category_id 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $data['name'],
            ':thumbnail' => $data['thumbnail'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':category_id' => $data['category_id'],
            ':id' => $data['id']
        ]);
        return $stmt->rowCount();
    }

    function search($keyword)
    {
        $key = "%$keyword%";
        $sql = "SELECT products.*, category.name AS categoryName
                FROM products
                LEFT JOIN category ON products.category_id = category.id
                WHERE products.name LIKE :name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $key]);
        return $stmt->fetchAll();
    }
}
?>