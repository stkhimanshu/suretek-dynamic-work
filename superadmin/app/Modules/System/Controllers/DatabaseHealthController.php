<?php

namespace App\Modules\System\Controllers;

use App\Core\Database\Connection;
use App\Core\Http\Response;

class DatabaseHealthController
{
    public function index(): void
    {
        try {

            $connection = new Connection();

            $pdo = $connection->getPDO();

            $stmt = $pdo->query('SELECT 1');

            $result = $stmt->fetch();

            Response::success([
                'database' => 'connected',
                'pdo_result' => $result,
            ], 'Direct PDO connection successful');
        } catch (\Throwable $e) {

            Response::error(
                'Database connection failed',
                500
            );
        }
    }
}
