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
}