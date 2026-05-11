<?php

namespace App\Modules\Category\Controllers;

use App\Core\Exceptions\ValidationException;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Modules\Category\Services\CategoryService;
use App\Modules\Category\Validators\CategoryValidator;

class CategoryController
{
    /*
    |--------------------------------------------------------------------------
    | GET Categories
    |--------------------------------------------------------------------------
    */
    public function index(): void
    {
        $type = trim($_GET['type'] ?? '');

        $service = new CategoryService();
        $categories = $service->getAll($type);

        Response::success(
            $categories,
            'Categories fetched successfully'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE Category
    |--------------------------------------------------------------------------
    */
    public function store(): void
    {
        $body = Request::body();

        $validation = CategoryValidator::validateCreate($body);

        if (!$validation['valid']) {
            throw new ValidationException(
                $validation['errors']
            );
        }

        $service = new CategoryService();
        $created = $service->create($body);

        if (!$created) {
            Response::error(
                'Failed to create category'
            );
        }

        Response::success(
            [],
            'Category created successfully'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE Category
    |--------------------------------------------------------------------------
    */
    public function update($id): void
    {
        $categoryId = (int) $id;

        if ($categoryId <= 0) {
            Response::error(
                'Invalid category id',
                422
            );
        }

        $body = Request::body();
        $validation = CategoryValidator::validateUpdate($body);

        if (!$validation['valid']) {
            throw new ValidationException(
                $validation['errors']
            );
        }

        $service = new CategoryService();
        $updated = $service->update($categoryId, $body);

        if (!$updated) {
            Response::error(
                'Failed to update category'
            );
        }

        Response::success(
            [],
            'Category updated successfully'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE Category
    |--------------------------------------------------------------------------
    */
    public function delete($id): void
    {
        $categoryId = (int) $id;

        if ($categoryId <= 0) {
            Response::error(
                'Invalid category id',
                422
            );
        }

        $service = new CategoryService();
        $deleted = $service->delete($categoryId);

        if (!$deleted) {
            Response::error(
                'Failed to delete category'
            );
        }

        Response::success(
            [],
            'Category deleted successfully'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */
    public function updateStatus($id): void
    {
        $categoryId = (int) $id;

        if ($categoryId <= 0) {
            Response::error(
                'Invalid category id',
                422
            );
        }

        $body = Request::body();
        $validation = CategoryValidator::validateUpdateStatus($body);

        if (!$validation['valid']) {
            throw new ValidationException(
                $validation['errors']
            );
        }

        $status = (int) $body['status'];

        if (!in_array($status, [0, 1], true)) {
            Response::error(
                'Status must be 0 or 1',
                422
            );
        }

        $service = new CategoryService();
        $updated = $service->updateStatus(
            $categoryId,
            $status
        );

        if (!$updated) {
            Response::error(
                'Failed to update category status'
            );
        }

        Response::success(
            [],
            'Category status updated successfully'
        );
    }
}
