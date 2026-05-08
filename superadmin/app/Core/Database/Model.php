<?php

namespace App\Core\Database;

abstract class Model
{
    protected string $table;

    public static function query(): QueryBuilder
    {
        return DB::table((new static())->table);
    }
}
