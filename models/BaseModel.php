<?php

class BaseModel
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8',
            DB_HOST,
            DB_PORT,
            DB_NAME
        );

        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, DB_OPTIONS);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: {$e->getMessage()}");
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    public function searchProducts($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'keyword' => '%' . $keyword . '%'
        ]);

        return $stmt->fetchAll();
    }
    public function createUser($data)
    {
        $sql = "INSERT INTO users (role_id, name, email, password, phone, address)
            VALUES (:role_id, :name, :email, :password, :phone, :address)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($data);
    }

    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'email' => $email
        ]);

        return $stmt->fetch();
    }
    public function createContact($data)
    {
        $sql = "INSERT INTO contacts (name, email, message)
            VALUES (:name, :email, :message)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($data);
    }
    public function insertProduct($data)
    {
        $sql = "INSERT INTO products (category_id, name, price, image, description)
            VALUES (:category_id, :name, :price, :image, :description)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function updateProduct($id, $data)
    {
        $sql = "UPDATE products
            SET category_id = :category_id,
                name = :name,
                price = :price,
                image = :image,
                description = :description
            WHERE id = :id";

        $data['id'] = $id;

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
