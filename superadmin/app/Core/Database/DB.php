<?php

namespace App\Core\Database;

class DB
{
    private static ?Connection $connection = null;

    public static function connection(): Connection
    {
        if (!self::$connection) {
            self::$connection = new Connection();
        }

        return self::$connection;
    }

    public static function table(string $table): QueryBuilder
    {
        return new QueryBuilder(
            self::connection()->getPDO(),
            $table
        );
    }
}
