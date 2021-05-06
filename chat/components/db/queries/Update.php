<?php

namespace components\db\queries;

use PDO;
use components\App;
use PDOStatement;
use RuntimeException;

class Update
{
    private PDO $db;
    private string $table;
    private array $data;
    private array $condition;

    public function __construct(string $table, array $data, array $condition)
    {
        $this->db = App::instance()->getDb()->getConnection();
        $this->table = $table;
        $this->data = array_filter($data);
        $this->condition = $condition;
    }

    public function getQuery(): PDOStatement
    {
        $keys = array_keys($this->data);
        $template = [];
        foreach ($keys as $key) {
            $template[] = "`{$key}` = :{$key}";
        }
        $templateString = implode(', ', $template);

        $conditions = [];
        foreach ($this->condition as $key => $value) {
            $conditions[] = "`{$key}` = :{$key}";
        }
        $conditionsString = implode(', ', $conditions);

        $sql = "UPDATE `{$this->table}` SET {$templateString} WHERE {$conditionsString}";
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new RuntimeException(json_encode($this->db->errorInfo(), JSON_THROW_ON_ERROR));
        }

        $params = array_merge($this->data, $this->condition);
        foreach ($params as $field => &$value) {
            $stmt->bindParam(":{$field}", $value);
        }

        return $stmt;
    }
}
