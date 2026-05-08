<?php

namespace App\Modules\System\Controllers;

use App\Core\Http\Response;

class HealthController
{
    public function index(): void
    {
        Response::success([
            'service' => 'Native CMS API',
            'status' => 'healthy',
            'timestamp' => date('Y-m-d H:i:s'),
            'php_version' => PHP_VERSION,
        ], 'Health check successful');
    }
}
