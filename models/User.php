<?php
class User extends BaseModel
{

    function check($username, $password, $email = '')
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    function add($data)
    {
        $sql = "SELECT * FROM user WHERE username = :username OR email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email']
        ]);

        if ($stmt->rowCount() == 0) {
            $sql = "INSERT INTO user (username, email, password) 
                    VALUES (:username, :email, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':username' => $data['username'],
                ':email' => $data['email'],
                ':password' => $data['password']
            ]);
            return $this->pdo->lastInsertId();
        } else {
            return 0;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function delete($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    function get($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
?>