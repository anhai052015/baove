<?php
class Category extends BaseModel
{
    function getAll()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $category = $stmt->fetchAll();
        return $category;
    }
}
?>