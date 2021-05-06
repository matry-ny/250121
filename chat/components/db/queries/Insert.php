<?php

namespace components\db\queries;

use PDO;
use components\App;
use PDOStatement;
use RuntimeException;

class Insert
{
    private PDO $db;
    private string $table;
    private array $data;

    public function __construct(string $table, array $data)
    {
        $this->db = App::instance()->getDb()->getConnection();
        $this->table = $table;
        $this->data = array_filter($data);
    }

    public function getQuery(): PDOStatement
    {
        $keys = array_keys($this->data);
        $fields = '`' . implode('`, `', $keys) . '`';
        $aliases = ':' . implode(', :', $keys);

        $sql = "INSERT INTO `{$this->table}` ({$fields}) VALUES ({$aliases})";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new RuntimeException(json_encode($this->db->errorInfo(), JSON_THROW_ON_ERROR));
        }

        foreach ($this->data as $field => &$value) {
            $stmt->bindParam(":{$field}", $value);
        }

        return $stmt;
    }
}
