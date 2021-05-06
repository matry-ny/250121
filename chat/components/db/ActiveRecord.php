<?php

namespace components\db;

use components\db\queries\Update;
use PDO;
use InvalidArgumentException;
use components\App;
use components\db\queries\Insert;

abstract class ActiveRecord
{
    private PDO $db;
    protected string $primaryKey;
    protected array $attributes = [];

    final public function __construct()
    {
        $this->db = App::instance()->getDb()->getConnection();

        $this->setPrimaryKey();
        $this->setSchema();
    }

    abstract protected static function tableName(): string;

    final public function __get(string $key): mixed
    {
        if (!array_key_exists($key, $this->attributes)) {
            throw new InvalidArgumentException("Column {$key} is not exists");
        }

        return $this->attributes[$key];
    }

    final public function __set(string $key, mixed $value): void
    {
        if (!array_key_exists($key, $this->attributes)) {
            throw new InvalidArgumentException("Column {$key} is not exists");
        }

        $this->attributes[$key] = $value;
    }

    final public function __sleep(): array
    {
        return ['attributes', 'primaryKey'];
    }

    final public function __wakeup()
    {
        $this->db = App::instance()->getDb()->getConnection();
    }

    public static function find(int|string $id, string $primaryKey = 'id'): static|bool
    {
        $db = App::instance()->getDb()->getConnection();

        $sql = 'SELECT * FROM ' . static::tableName() . " WHERE {$primaryKey} = :{$primaryKey}";
        $stmt = $db->prepare($sql);
        $stmt->execute([$primaryKey => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, static::class);

        return $stmt->fetch();
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = App::instance()->getDb()->getConnection();

        $sql = 'SELECT * FROM ' . static::tableName();
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, static::class);
    }

    public function insert(): bool
    {
        return (new Insert(static::tableName(), $this->attributes))->getQuery()->execute();
    }

    public function update(): bool
    {
        $query = new Update(
            static::tableName(),
            $this->attributes,
            [$this->primaryKey => $this->{$this->primaryKey}]
        );
        return $query->getQuery()->execute();
    }

    private function setSchema(): void
    {
        $sql = <<<SQL
            SELECT COLUMN_NAME
            FROM information_schema.columns
            WHERE 
                TABLE_NAME = :table
                AND TABLE_SCHEMA = :schema
        SQL;
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'table' => static::tableName(),
            'schema' => App::instance()->config()->get('db.name')
        ]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $this->attributes[$value['COLUMN_NAME']] = null;
        }
    }

    private function setPrimaryKey(): void
    {
        $sql = 'SHOW KEYS FROM ' . static::tableName() . ' WHERE Key_name = "PRIMARY"';
        $stmt = $this->db->query($sql);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!isset($data['Column_name']) || empty($data['Column_name'])) {
            throw new InvalidArgumentException('Table ' . static::tableName() . ' has no primary key');
        }

        $this->primaryKey = $data['Column_name'];
    }
}
