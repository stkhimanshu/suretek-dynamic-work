<?php

namespace App\Modules\Category\Services;

use App\Modules\Category\Repositories\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository =
            new CategoryRepository();
    }

    /*
    |--------------------------------------------------------------------------
    | Get Categories
    |--------------------------------------------------------------------------
    */
    public function getAll(
        ?string $type = null
    ): array {

        return $this->categoryRepository
            ->getAll($type);
    }

    /*
    |--------------------------------------------------------------------------
    | Create Category
    |--------------------------------------------------------------------------
    */
    public function create(
        array $data
    ): bool {

        $exists = $this->categoryRepository
            ->findByTitleAndType(
                $data['title'],
                $data['type']
            );

        if ($exists) {
            return false;
        }

        return $this->categoryRepository
            ->create([
                'title' => $data['title'],

                'slug' => $this->generateSlug(
                    $data['title']
                ),

                'type' => $data['type'],

                'status' => $data['status'] ?? 1,

            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Category
    |--------------------------------------------------------------------------
    */
    public function update(
        int $id,
        array $data
    ): bool {
        $existing = $this->categoryRepository
            ->findById($id);

        if (!$existing) {
            return false;
        }

        $duplicate = $this->categoryRepository
            ->findByTitleAndTypeExceptId(
                $data['title'],
                $data['type'],
                $id
            );

        if ($duplicate) {
            return false;
        }

        return $this->categoryRepository
            ->update($id, [

                'title' => $data['title'],

                'slug' => $this->generateSlug(
                    $data['title']
                ),

                'type' => $data['type'],

            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Status
    |--------------------------------------------------------------------------
    */
    public function updateStatus(
        int $id,
        int $status
    ): bool {
        $existing = $this->categoryRepository
            ->findById($id);

        if (!$existing) {
            return false;
        }

        return $this->categoryRepository
            ->update($id, [
                'status' => $status,
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    public function delete(
        int $id
    ): bool {
        $existing = $this->categoryRepository
            ->findById($id);

        if (!$existing) {
            return false;
        }

        return $this->categoryRepository
            ->delete($id);
    }

    /*
    |--------------------------------------------------------------------------
    | Generate Slug
    |--------------------------------------------------------------------------
    */
    private function generateSlug(
        string $text
    ): string {

        $text = strtolower($text);

        $text = preg_replace(
            '/[^a-z0-9]+/',
            '-',
            $text
        );

        return trim($text, '-');
    }
}
