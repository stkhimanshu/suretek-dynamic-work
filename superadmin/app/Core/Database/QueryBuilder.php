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
        string|int|float|bool|null $operatorOrValue,
        mixed $value = null
    ): self {
        $operator = '=';
        $binding = $operatorOrValue;

        if (func_num_args() === 3) {
            $operator = (string) $operatorOrValue;
            $binding = $value;
        }

        $this->wheres[] = "{$column} {$operator} ?";
        $this->bindings[] = $binding;

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

    public function update(array $data): bool
    {
        if (empty($data)) {
            return false;
        }

        $setClause = implode(
            ', ',
            array_map(
                fn(string $column): string => "{$column} = ?",
                array_keys($data)
            )
        );

        $sql = "UPDATE {$this->table} SET {$setClause}";

        if (!empty($this->wheres)) {
            $sql .= " WHERE " . implode(' AND ', $this->wheres);
        }

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ...array_values($data),
            ...$this->bindings,
        ]);
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM {$this->table}";

        if (!empty($this->wheres)) {
            $sql .= " WHERE " . implode(' AND ', $this->wheres);
        }

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($this->bindings);
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
