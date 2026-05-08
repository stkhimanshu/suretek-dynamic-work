<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    private PDO $pdo;

    private string $table;

    private array $selects = ['*'];

    private array $wheres = [];

    private array $bindings = [];

    private ?string $orderBy = null;

    private ?int $limitValue = null;

    public function __construct(
        PDO $pdo,
        string $table
    ) {

        $this->pdo = $pdo;

        $this->table = $table;
    }

    public function select(array $columns): self
    {
        $this->selects = $columns;

        return $this;
    }

    public function where(
        string $column,
        string $operator,
        mixed $value
    ): self {

        $this->wheres[] =
            "{$column} {$operator} ?";

        $this->bindings[] = $value;

        return $this;
    }

    public function orderBy(
        string $column,
        string $direction = 'ASC'
    ): self {

        $this->orderBy =
            "ORDER BY {$column} {$direction}";

        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limitValue = $limit;

        return $this;
    }

    public function get(): array
    {
        $stmt = $this->pdo->prepare(
            $this->toSql()
        );

        $stmt->execute($this->bindings);

        return $stmt->fetchAll();
    }

    public function first(): ?array
    {
        $this->limit(1);

        $result = $this->get();

        return $result[0] ?? null;
    }

    public function insert(array $data): bool
    {
        $columns = array_keys($data);

        $placeholders = implode(
            ', ',
            array_fill(
                0,
                count($columns),
                '?'
            )
        );

        $sql = "
            INSERT INTO {$this->table}
            (" . implode(', ', $columns) . ")
            VALUES
            ({$placeholders})
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute(
            array_values($data)
        );
    }

    private function toSql(): string
    {
        $sql = "SELECT " .
            implode(', ', $this->selects);

        $sql .= " FROM {$this->table}";

        if (!empty($this->wheres)) {

            $sql .= " WHERE " .
                implode(
                    ' AND ',
                    $this->wheres
                );
        }

        if ($this->orderBy) {

            $sql .= " {$this->orderBy}";
        }

        if ($this->limitValue) {

            $sql .=
                " LIMIT {$this->limitValue}";
        }

        return $sql;
    }
}
