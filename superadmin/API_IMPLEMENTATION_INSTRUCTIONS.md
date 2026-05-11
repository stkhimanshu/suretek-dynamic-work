# API Implementation Instructions (No Guesswork)

This file is the standard playbook for creating new APIs in `superadmin`.
Follow these steps exactly for every new endpoint.

---

## 1) Mandatory Architecture

Every API must follow this flow:

`Route -> Controller -> Validator -> Service -> Repository -> DB`

Keep responsibilities strict:

- **Route**: only URL + HTTP method + controller method mapping.
- **Controller**: parse request, validate input, call service, return response.
- **Validator**: input rules only (no DB calls, no business logic).
- **Service**: business logic only (orchestration, transformation, checks).
- **Repository**: data access only (`DB::table(...)` / query builder).
- **QueryBuilder**: common DB operations (`where`, `get`, `first`, `insert`, `update`, `delete`).

---

## 2) Folder/File Structure For A Module

For module `<ModuleName>`, create:

- `app/Modules/<ModuleName>/Controllers/<ModuleName>Controller.php`
- `app/Modules/<ModuleName>/Services/<ModuleName>Service.php`
- `app/Modules/<ModuleName>/Repositories/<ModuleName>Repository.php`
- `app/Modules/<ModuleName>/Validators/<ModuleName>Validator.php`

If a model is needed:

- `app/Modules/<ModuleName>/Models/<ModuleName>.php`

---

## 3) Route Rules (`routes/api.php`)

Define routes in one place with clear naming and versioning where applicable.

Example:

```php
Router::get('/api/v1/products', [ProductController::class, 'index']);
Router::post('/api/v1/products', [ProductController::class, 'store']);
Router::put('/api/v1/products/{id}', [ProductController::class, 'update']);
Router::delete('/api/v1/products/{id}', [ProductController::class, 'delete']);
Router::patch('/api/v1/products/{id}/status', [ProductController::class, 'updateStatus']);
```

Rules:

- Use plural resource names.
- Use `{id}` for path params.
- Use `PATCH` for partial update/status toggles.
- Keep naming consistent across all modules.

---

## 4) Controller Rules (Thin Controller)

Controller should only:

1. Read request body (`Request::body()` for JSON).
2. Validate with module validator.
3. Throw `ValidationException` when invalid.
4. Call service.
5. Return standardized response (`Response::success` / `Response::error`).

Required imports pattern:

```php
use App\Core\Exceptions\ValidationException;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Modules\<Module>\Services\<Module>Service;
use App\Modules\<Module>\Validators\<Module>Validator;
```

Controller checklist:

- Add return type `: void`.
- Cast route id params to int.
- Reject invalid ids (`<= 0`) with 422.
- No SQL or repository calls directly in controller.

---

## 5) Validator Rules

Validator class must return:

```php
[
  'valid' => bool,
  'errors' => array
]
```

Use `App\Core\Validation\Validator`.

Typical methods:

- `validateCreate(array $data): array`
- `validateUpdate(array $data): array`
- `validateUpdateStatus(array $data): array`

Validation responsibilities:

- Required fields
- Type/format constraints (email, min, max, etc.)
- No business logic (duplicate checks belong in service/repository)

---

## 6) Service Rules (Business Logic Layer)

Service should:

- Accept sanitized/validated arrays from controller.
- Handle business checks (duplicate, not found, allowed state transitions).
- Build write payloads (`slug`, timestamps, normalization, etc.).
- Call repository methods.
- Return `bool` for simple success/failure OR structured data where needed.

Guidelines:

- Keep method names action-based: `create`, `update`, `delete`, `getAll`, `updateStatus`.
- Avoid direct superglobals (`$_POST`, `$_GET`) in service.
- Avoid direct DB calls in service.

---

## 7) Repository Rules (Data Access Layer)

Repository should only interact with DB/query builder.

Use pattern:

```php
DB::table($this->table)
  ->where('id', '=', $id)
  ->first();
```

Rules:

- Keep table name in one property (`private string $table = '...'`).
- Expose focused methods:
  - `getAll(...)`
  - `findById(int $id)`
  - `findBy<Field>(...)`
  - `create(array $data)`
  - `update(int $id, array $data)`
  - `delete(int $id)`
- No request parsing or response formatting in repository.

---

## 8) DB Payload Contract (Important)

Before writing insert/update code, confirm table columns.

**Never guess DB fields.**

Pre-check list:

1. Verify required columns exist in DB table.
2. Match payload keys exactly to DB columns.
3. Do not send fields that do not exist (example: `uuid` if table has no `uuid`).
4. Keep defaults aligned with DB defaults where possible.

If schema is missing a required field:

- Either update schema first, or
- Remove field from write payload and keep logic consistent.

---

## 9) Standard Response Contract

Use:

- `Response::success($data, $message)`
- `Response::error($message, $statusCode)`

For validation failures:

- Throw `ValidationException($errors)` from controller.
- Let global exception handler format output.

Recommended status behavior:

- `200` for success reads/updates/deletes
- `201` if create flow is explicitly configured for created (optional in current codebase)
- `422` for validation issues
- `401/403` for auth/permission issues
- `500` fallback handled globally

---

## 10) Template Skeleton (Copy This)

### Controller Method (Create)

```php
public function store(): void
{
    $body = Request::body();

    $validation = ProductValidator::validateCreate($body);
    if (!$validation['valid']) {
        throw new ValidationException($validation['errors']);
    }

    $service = new ProductService();
    $created = $service->create($body);

    if (!$created) {
        Response::error('Failed to create product');
    }

    Response::success([], 'Product created successfully');
}
```

### Service Method (Create)

```php
public function create(array $data): bool
{
    $exists = $this->productRepository->findByName($data['name']);
    if ($exists) {
        return false;
    }

    return $this->productRepository->create([
        'name' => trim($data['name']),
        'status' => $data['status'] ?? 1,
    ]);
}
```

### Repository Methods (Create/Update/Delete)

```php
public function create(array $data): bool
{
    return DB::table($this->table)->insert($data);
}

public function update(int $id, array $data): bool
{
    return DB::table($this->table)
        ->where('id', '=', $id)
        ->update($data);
}

public function delete(int $id): bool
{
    return DB::table($this->table)
        ->where('id', '=', $id)
        ->delete();
}
```

---

## 11) Final Pre-Merge Checklist

Before considering API complete:

- [ ] Route added with correct HTTP method and path
- [ ] Controller uses `Request`, validator, service, and `Response`
- [ ] Validation methods exist and are used
- [ ] Service contains business rules only
- [ ] Repository contains DB queries only
- [ ] No direct PDO in module files (unless absolutely necessary and documented)
- [ ] DB payload fields exactly match schema columns
- [ ] All changed files have no lint/syntax issues
- [ ] Endpoint tested with valid + invalid payloads

---

## 12) Common Mistakes To Avoid

- Mixing `$_POST`/`parse_str` and JSON APIs inconsistently.
- Passing wrong argument shape between controller and service.
- Returning mixed response shapes across modules.
- Writing SQL in controllers/services.
- Adding fields not present in DB schema.
- Skipping validator and doing manual scattered checks.

---

If any new API does not follow this file, treat it as incomplete and refactor before merging.
