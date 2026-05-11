<?php

namespace App\Modules\Category\Repositories;

use App\Core\Database\DB;

class CategoryRepository
{
    private string $table = 'categories';

    /*
    |--------------------------------------------------------------------------
    | Get All
    |--------------------------------------------------------------------------
    */
    public function getAll(
        ?string $type = null
    ): array {

        $query = DB::table($this->table);

        if ($type) {

            $query->where('type', '=', $type);
        }

        return $query
            ->orderBy('id', 'DESC')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | Find By ID
    |--------------------------------------------------------------------------
    */
    public function findById(
        int $id
    ): ?array {

        return DB::table($this->table)
            ->where('id', '=', $id)
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Find By Title + Type
    |--------------------------------------------------------------------------
    */
    public function findByTitleAndType(
        string $title,
        string $type
    ): ?array {

        return DB::table($this->table)
            ->where('title', '=', $title)
            ->where('type', '=', $type)
            ->first();
    }

    public function findByTitleAndTypeExceptId(
        string $title,
        string $type,
        int $id
    ): ?array {

        return DB::table($this->table)
            ->where('title', '=', $title)
            ->where('type', '=', $type)
            ->where('id', '!=', $id)
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */
    public function create(
        array $data
    ): bool {

        return DB::table($this->table)
            ->insert($data);
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
    public function update(
        int $id,
        array $data
    ): bool {
        return DB::table($this->table)
            ->where('id', '=', $id)
            ->update($data);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    public function delete(
        int $id
    ): bool {
        return DB::table($this->table)
            ->where('id', '=', $id)
            ->delete();
    }
}
