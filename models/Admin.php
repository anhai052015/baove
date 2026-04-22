<?php
class Admin extends BaseModel
{
    public function check($data)
    {
        $sql = 'SELECT * FROM admin WHERE adminname = :adminname AND password = :password';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        $admin = $stmt->fetch();
        return $admin;
    }
}
?>