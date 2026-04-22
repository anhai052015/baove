<?php
class Comment extends BaseModel
{
    public function add($data)
    {
        $sql = "INSERT INTO comments (product_id, user_id, content) VALUES (:product_id, :user_id, :content)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function getByProduct($product_id)
    {
        $sql = "SELECT c.*, u.username 
                FROM comments c
                JOIN user u ON c.user_id = u.id
                WHERE c.product_id = ?
                ORDER BY c.created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll();
    }

    function getAll()
    {
        $sql = "SELECT * FROM comments";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $comment = $stmt->fetchAll();
        return $comment;
    }
}
?>